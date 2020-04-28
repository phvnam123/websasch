<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Model\Order;
use App\Model\Order_detail;

/**
  * 
  */
 class HomeController extends Controller
 {
 	
 	public function index(){

 		$product = Product::all()->where('status',1)->count();
 		// dd($product);
 		// san pham duoc ban ra nhieu nhat
 		$order = Order_detail::select('product_id')->distinct()->get();
 		$max = 0;
 		$maxproduct = 0;
 		foreach ($order as $key => $ord) {
 			// dd($ord->product_id);
 			$prod = Order_detail::where('product_id',$ord->product_id)->count();
 			if ($max < $prod) {
 				$max = $prod ;
 				$maxproduct = Product::where('id',$ord->product_id)->first();
 			}

 			
 		}
 		

 		
 		
 		// dd($order);
 		// tong thu nhap
 		$order_sum = Order_detail::select('product_id')->sum('price');
 		// cac don hang chua duoc phe duyet
 		$order_count = Order::where('status',1)->count();
 		// dd($order);

 			// dd($order);

 		   return view('admin.admin',[
 		   	'maxproduct'=>$maxproduct,
 		   	'order_sum'=>$order_sum,
 		   	'order_count'=>$order_count,
 		   	'product'=>$product
 		   ]);

 	}
 } ?>