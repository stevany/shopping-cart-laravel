<?php
use Illuminate\Database\Seeder;
Class BooksTableSeeder extends Seeder{
	public function run(){
		DB::table('books')->insert([
			'title' => 'Requiem',
			'isbn' => '97823222',
			'price' => 13.40,
			// 'cover' => 'requiem.jpg',
			'author_id' =>1]);
		
		DB::table('books')->insert([
			'title' =>'Cell',
			'isbn' =>'787888884',
			'price' =>15.90,
			// 'cover' =>'cell.jpg',
			'author_id' =>2	]);

		DB::table('books')->insert([
			'title'=>'Deception Point',
			'isbn' =>'98434343545',
			'price' => 16.40,
			// 'cover' =>'deception.jpg',
			'author_id' =>3
			]);
	}
}