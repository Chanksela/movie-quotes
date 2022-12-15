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
	protected $signature = 'register:user';

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
	public function handle(User $user)
	{
		$username = $this->ask('What is the user username?');
		$password = $this->ask('What is the user password?');
		$confirm_password = $this->ask('Please repeat the password');
		if (User::all()->pluck('username')->contains($username))
		{
			$this->error('username already exists');
		}
		if ($password !== $confirm_password)
		{
			$this->error('Password does not match');
		}
		if (strlen($username) < 3)
		{
			$this->error('Password mus be longer than 3 characters');
		}
		if (strlen($password) < 6)
		{
			$this->error('Password mus be longer than 6 characters');
		}
		else
		{
			$this->info('User created!');
			User::create([
				'username'     => $username,
				'password'     => bcrypt($password),
			]);
		}
	}
}
