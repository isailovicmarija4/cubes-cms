<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
		DB::table('password_resets')->truncate();
		
		DB::table('users')->insert([
			'name' => 'Administrator',
			'email' => 'php@cubes.edu.rs',
			'password' => bcrypt('cubes')
		]);
    }
}
