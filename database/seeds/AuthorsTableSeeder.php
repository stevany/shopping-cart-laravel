<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

Class AuthorsTableSeeder extends Seeder{
	public function run(){
		DB::table('authors')->insert([
			'name' =>'Lauren',
			'surname' => 'Oliver'
			]);

		DB::table('authors')->insert([
			'name' => 'Stephen',
			'surname' => 'King'
		]);

		DB::table('authors')->insert([
			'name' => 'Sidney',
			'surname' => 'Sheldon'
		]);
	}
}