<?php
namespace App;
use Illuminate\Database\Eloquent\Model;


Class Book extends Model{
	protected $table='books';
	/**
	 *
	 * @var array
	 */
	protected $fillable=[
		'title',
		'isbn',
		'cover',
		'price',
		'author_id'
		];

	public function Author(){
		return $this->belongsTo(Author::class);
	}
}