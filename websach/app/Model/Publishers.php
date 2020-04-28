<?php 
namespace App\Model;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

Class Publishers extends 	Model
{
	use SoftDeletes;

	protected $dates = ['deleted_at'];

	protected $table = 'publishers';

	protected $fillable = [
		'name'
	];
}


 ?>