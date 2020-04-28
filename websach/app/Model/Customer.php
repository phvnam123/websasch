<?php 
namespace App\Model;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\Users;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
Class Customer extends 	Authenticatable
{
	use SoftDeletes;

	protected $dates = ['deleted_at'];

	protected $table = 'customer';

	protected $fillable = [
		'name','email','phoner','password','address','about','remember_token'
	];
}


 ?>