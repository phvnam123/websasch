<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Model\order_detail;
use Illuminate\Http\Request;

/**
  * 
  */
 class OrderController extends Controller
 {
 	
 	public function index(){

 		$order = Order::paginate(10);
        // dd($order);
 		// dd($cat);
 		return view('order.index',[
 			'ord'=>$order
 		]);
 	}
    public function order_detail($id){
        // $detail = order_detail::where('orders_id',$id)->get();
        // dd($detail);
        $detail = Order_detail::
        join('orders', 'orders_detail.orders_id', '=', 'orders.id')
            ->join('product', 'orders_detail.product_id', '=', 'product.id')
            ->where('orders_id',$id)
            ->select('product.name','product.image','orders.shipping', 'orders_detail.price','orders_detail.quantity')
            ->get();
            // dd($detail);
        return view('order.detail',[
            'deta'=>$detail
        ]);
    }

    public function order_pendding( Request $request ,$id){
        if ($id) {
            Order::where('id',$id)->update([
                'status' => 2
            ]);
            return redirect()->route('order-admin');
        }
    }

    public function delete_all(Request $request){
        dd($request->all());
        Order::destroy($request->id);
        return redirect()->route('order-admin')->with('sussec','xóa thành công các đơn hàng');
    }

    


 }
  ?>