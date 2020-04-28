<?php 
namespace App\Model;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

Class Order extends Model
{
	use SoftDeletes;

	protected $dates = ['deleted_at'];

	protected $table = 'orders';

	protected $fillable = [
		'customer_id','status','phone','address','shipping','about'
	];

	public function cus()
	{
		return $this->hasOne('App\Model\Customer','id','customer_id');
	}

	public function order_dt(){
		return $this->hasMany('App\Model\Order_detail','orders_id','id');
	}

	public function total_amount(){
		$order_detail = order_detail::where('orders_id',$this->id)->get();
		$st = 0;
		foreach ($order_detail as $key => $ord) {
			$st = $st + ($ord->price*$ord->quantity);
		}
		return $st;
	}
}


 ?>