<?php 
namespace App\Model;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\Users;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
Class Feedback extends 	Authenticatable
{
	use SoftDeletes;

	protected $dates = ['deleted_at'];

	protected $table = 'feedback';

	protected $fillable = [
		'comment','customer_id','product_id'
	];
	public function comment()
	{
		return $this->hasMany('\App\Model\Product','id','product_id');
	}
	public function customer()
	{
		return $this->hasOne('\App\Model\Customer','id','customer_id');
	}
}


 ?>