<?php 
namespace App\Mail;


use App\Helpers\Cart;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use Auth;
/**
 * 
 */
class OrderMail extends Mailable
{
	use Queueable, SerializesModels;

	public $order;
	public function __construct($order){
		$this->order = $order; 
	}

	public function build(){
		return $this->view('emails.order_email')->with([
			'cart'=>new Cart,
			'name'=> Auth::guard('cus')->user()->name,
			'order'=>$this->order

		]);
	}
}

 ?>