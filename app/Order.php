<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
Class Order extends Model{
	protected $table='orders';

	/**
	 * @var array
	 */
	 protected $fillable=[
	 	'member_id',
	 	'address',
	 	'total'
	 	];
	 public function orderItems(){
	 	return $this->belongsToMany('Book')->withPivot('amount','total');
	 }

}