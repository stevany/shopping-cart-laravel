<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
Class Cart extends Model{
	protected $table='carts';

	/**
	 * @var array
	 */
	protected $fillable=[
		'member_id',
		'book_id',
		'amount',
		'total'
		];

	public function Books(){
		return $this->belongsTo(Book::class,'book_id');
	}
}