<?php 
namespace App\Model;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

Class Order_detail extends Model
{
	use SoftDeletes;

	protected $dates = ['deleted_at'];

	protected $table = 'orders_detail';

	protected $fillable = [
		'orders_id','product_id','price','quantity'
	];

	public function order()
	{
		return $this->hasOne('App\Model\Order','id','orders_id');
	}
	public function product()
	{
		return $this->hasOne('App\Model\Product','id','product_id');
	}
}


 ?>