<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Customer;
use App\Model\Product;
use App\Model\Order;
use App\Model\Order_detail;
use App\Model\Image;
use App\Model\News;
use Auth;
use View;
use Mail;
use App\Helpers\Cart;
use App\Mail\OrderMail;
use Illuminate\Auth\SessionGuard;


/**
 * 
 */
class OrderController extends Controller
{
	
	public function __construct()
	{
		$this->middleware(function($request,$next){
			View::share([
				'cart'=> new Cart(),
				'category'=>Category::all(),
				'banners'=>Image::all(),
				'news' => News::orderBy('id','DESC')->paginate(2),

            ]);
			return $next($request);
		});
	}
	public function index(){
		return view('home.order');
	}

	public function post_order(Request $request, Cart $cart){
		$this->validate($request,[
				'name'=>'required',
				'email'=>'required',
				'address'=>'required',
				'about'=>'required'

			],[
				'name.required'=>'Tên danh mục không được trống',
				'email.required'=>'Tên đường dẫn không được trống',
				'address.required'=>'Bạn hãy điền địa chỉ',
				'about.required'=>'bạn hãy điền ghi chú nếu không bạn hãy ghi không',

			]);
		$request->merge(['customer_id'=>Auth::guard('cus')->id()]);
		$data = [];
		if($order= Order::create($request->all())){
			foreach ($cart->items as $item) {
			$data[]=[
				'product_id' => $item['id'],
				'price' => $item['price'],
				'quantity' => $item['quantity'],
				'orders_id' => $order->id,
			];
			$pro_ink = Product::where('id',$item['id'])->first();
			if ($pro_ink->quantity_now > $item['quantity']) {
				Product::where('id',$item['id'])->decrement('quantity_now',$item['quantity']);
			}else{
				return redirect()->route('order-error')->with('errorss','Order không thành công số lượng trong kho không đủ đáp ứng nhu cầu khách hàng');
			}
		}
			if($data){
				if (Order_detail::insert($data)) {
					Mail::to(Auth::guard('cus')->user()->email)->send(new OrderMail($order));
					$cart->clear();
					if($request->shipping == 'ngan-luong'){
						return view('home.ngan_luong',[
							'order_id'=>$order->id,
							'price'=>$cart->total_amount
						]);
					}
					return redirect()->route('order-success')->with('success','thêm mới đơn hàng thành công');
				}else{
				$order->delete();
				return redirect()->route('order-error')->with('success','thêm mới đơn hàng thành công');
			}
		}else{
			
		}
	}
}


	public function order_success(){

		return view ('home.order_success');
	}
	public function order_error(){
	
		return view('home.order-error');
	}

	public function order_history(){
		// $matan = [];
		// $order = Order_detail::select('orders_id')->distinct()->get()->count();
		// // $order1 = Order_detail::select('quantity')->where('orders_id',18)->count();
		// dd($order);
		if (Auth::guard('cus')->check()) {
		$order = Order::where('customer_id',Auth::guard('cus')->id())->get();
		return view('home.order_history',[
			'order'=>$order
		]);
		}else{
			return view('error.404');
		}
	}


	public function order_detail($id){
		$orders = Order_detail::
		join('orders', 'orders_detail.orders_id', '=', 'orders.id')
            ->join('product', 'orders_detail.product_id', '=', 'product.id')
            ->where('orders_id',$id)
            ->select('product.name','product.image','orders.shipping', 'orders_detail.price','orders_detail.quantity')
            ->get();
            // dd($orders);
		return view('home.order_detail',[
			'order'=>$orders
		]);
	}

	

}
 ?>