<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
Class Author extends Model{

	protected $table='authors';
	/**
	 * The attributes exclueded from the model's JSON form;
	 *
	 * @var array
	 */	
	//Add to the "fillable" array
	protected $fillable=[
		'name', 
		'surname'
		];

}