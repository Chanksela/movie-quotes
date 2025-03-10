<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Movie;
use App\Models\Quote;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		
		Movie::factory(5)->create();
		Quote::factory(5)->create();

		User::create([
			'username' => 'test@test.ge',
			'password' => Hash::make('popgof1994'),
		]);
	}
}
