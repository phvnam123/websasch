<?php 
namespace App\Model;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

Class News extends 	Model
{
	use SoftDeletes;

	protected $dates = ['deleted_at'];

	protected $table = 'news';

	protected $fillable = [
		'user_id','title','description','slug','image','full'
	];
}


 ?>