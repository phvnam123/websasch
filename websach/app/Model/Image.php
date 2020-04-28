<?php 
namespace App\Model;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

Class Image extends Model
{
	use SoftDeletes;

	protected $dates = ['deleted_at'];

	protected $table = 'image_manager';

	protected $fillable = [
		'image','status','user_id','name'
	];
}


 ?>