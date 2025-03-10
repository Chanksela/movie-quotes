<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class RegisterNewUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'register:user 
                            {--username= : The username for the new user}
                            {--password= : The password for the new user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Register new user';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            // Get username either from option or by asking
            $username = $this->option('username');
            if (!$username) {
                $username = $this->ask('What is the user username?');
            }
            
            // Check username
            if (strlen($username) < 3) {
                $this->error('Username must be longer than 3 characters');
                return 1;
            }
            
            if (User::all()->pluck('username')->contains($username)) {
                $this->error('Username already exists');
                return 1;
            }
            
            // Get password either from option or by asking
            $password = $this->option('password');
            if (!$password) {
                $password = $this->secret('What is the user password?');
                $confirm_password = $this->secret('Please repeat the password');
                
                if ($password !== $confirm_password) {
                    $this->error('Password does not match');
                    return 1;
                }
            }
            
            // Check password
            if (strlen($password) < 6) {
                $this->error('Password must be longer than 6 characters');
                return 1;
            }
            
            // Create user
            User::create([
                'username' => $username,
                'password' => bcrypt($password),
            ]);
            
            $this->info('User created successfully!');
            return 0;
            
        } catch (\Exception $e) {
            $this->error('Failed to create user: ' . $e->getMessage());
            return 1;
        }
    }
}