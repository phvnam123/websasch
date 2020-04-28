<?php 
namespace App\Model;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

Class Category extends 	Model
{
	use SoftDeletes;

	protected $dates = ['deleted_at'];

	protected $table = 'category';

	protected $fillable = [
		'name','slug','stautus',
	];

	public function product()
	{
		return $this->hasMany('App\Model\Product','category_id','id');
	}
}


 ?>