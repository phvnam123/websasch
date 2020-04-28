<?php 

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

Class Pruchases extends Model
{
	use SoftDeletes;

	protected $dates = ['deleted_at'];

	protected $table = 'pruchases';

	protected $fillable = [
		'MADH','user_id','total_money','notes','order_date','delivery_date'
	];

	public function user(){
		return $this->hasOne('App\User','id','user_id');
	}
}

 ?>