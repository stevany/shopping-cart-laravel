<?php
use Illuminate\Database\Seeder;

Class UsersTableSeeder extends Seeder{
	public function run(){
		DB::table('users')->insert([
			'email' => 'member@email.com',
			'password' => Hash::make('password'),
			'name' => 'John Doe',
			'admin' => 0
			]);

		DB::table('users')->insert([
			'email' => 'admin@store.com',
			'password' => Hash::make('adminpassword'),
			'name' => 'Jennifer Taylor',
			'admin' =>1
			]);
	}
}