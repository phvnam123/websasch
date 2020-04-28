<?php 
namespace App\Model;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

Class Product extends 	Model
{
	use SoftDeletes;

	protected $dates = ['deleted_at'];

	protected $table = 'product';

	protected $fillable = [
		'name','slug','category_id','publishers_id','quantity','quantity_now','writer_name','about','image','price','sale_price','status','user_id','pruchases_id'
	];

	public function cat()
	{
		return $this->hasOne('App\Model\Category','id','category_id');
	}

	public function publishers()
	{
		return $this->hasOne('App\Model\Publishers','id','publishers_id');
	}

	public function pruchases()
	{
		return $this->hasOne('App\Model\Pruchases','id','pruchases_id');
	}
	public function comment()
	{
		return $this->hasMany('\App\Model\Feedback','product_id','id');
	}
}


 ?>