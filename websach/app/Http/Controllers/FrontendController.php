<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Customer;
use App\Model\Product;
use App\Model\Order_detail;
use App\Model\Image;
use App\Model\News;
use App\Model\Feedback;
use Auth;
use View;
use App\Helpers\Cart;
use Illuminate\Auth\SessionGuard;


/**
 * 
 */
class FrontendController extends Controller
{
	
	public function __construct()
	{
		$this->middleware(function($request,$next){
			View::share([
				'cart'=> new Cart(),
				'category'=>Category::orderBy('name','DESC')->get(),
				'news' => News::orderBy('id','DESC')->paginate(2),
				'banners'=>Image::all(),

            ]);
			return $next($request);
		});
	}
	public function index(){
		$product = Product::orderBy('name','ASC')->where('status',1)->where('quantity_now','>',0)->paginate(6);
		// dd($product);
		return view('home.index',[
			'product'=>$product
		]);
	}

	public function create_customer(){
		return view('home.create_customer');
	}
	public function post_create_customer(Request $request){
		// dd($request->all());
		$this->validate($request,[
			'name'=>'required',
			'email'=>'required|email|unique:customer,email',
			'password'=>'required',
			'comfirm_password'=>'required|same:password'
		],[
			'name.required'=>'vui lòng nhập tên đầy đủ',
			'email.required'=>'nhập email',
			'email.email'=>'sai định dạng email',
			'email.unique'=>'email đã tồn tại',
			'password.required'=>'vui lòng nhập password',
			'comfirm_password.required'=>'vui lòng nhập confỉrm_password',
			'comfirm_password.same'=>'xác nhập password sai'
		]);
		$request->merge(['password'=>bcrypt($request->password)]);
		// dd($request->all());
		if(Customer::create($request->all())){
			return redirect()->route('home_login')->with('success','thêm  customer thành công');
		}else{
			return redirect()->back()->with('error','thêm customer không thành công');
		}
	}
	public function login(){
		return view('home.login');
	}

	public function post_login(Request $request){
		Auth::guard('cus')->logout();
		if(Auth::guard('cus')->attempt($request->only('email','password'),$request->has('remember'))){
			return redirect()->route('home')->with('success','chào mừng quay trở lại');
		}else{
			return redirect()->back()->with('error','đăng nhập không thành công');
		}
	}

	public function logout(){
		Auth::guard('cus')->logout();
		return redirect()->back()->with('success','thoát thành công');
	}

//gio hang
	public function cartview(Cart $cart){
		$product = Order_detail::select('product_id')->distinct()->get();
 		$max = 0;
 		foreach ($product as $key => $ord) {
 			// dd($ord->product_id);
 			$prod = Order_detail::where('product_id',$ord->product_id)->count();
 			if ($max < $prod) {
 				$max = $prod ;
 				$product = Product::where('id',$ord->product_id)->first();
 			}

 			
 		}
		$mang = [];
		//kiem tra check = 1
		$mang_1= ['58','57'];
		//kiem tra check =2
		$mang_2= ['61','59'];
		//kiem tra check = 3
		$mang_3=['49','51'];
		//kiem tra check =4
		$mang_4=['66','64','65'];
		//kiem tra check = 5
		$mang_5=['70','67'];
		//kiem tra check = 6
		$mang_6=['46','45','44'];
		//kiem tra check = 7
		$mang_7=['38','41'];
		//kiem tra check = 8
		$mang_8=['76','72','74'];
		$check_1 = 0;
		$check_2 = 0;
		$check_3 = 0;
		$check_4 = 0;
		$check_5 = 0;
		$check_6 = 0;
		$check_7 = 0;
		$check_8 = 0;
		foreach ($cart->items as $key => $ca) {
			array_push($mang, $ca['id']);
		}
		// dd($mang);
		//check=1
		foreach ($mang_1 as $key => $m) {
				foreach ($mang as $k => $ma) {
					if ($m==$ma) {
						$check_1= $check_1 + 1;
					}
				}
				
			}
		foreach ($mang_2 as $key => $m) {

				foreach ($mang as $k => $ma) {
					if ($m==$ma) {
						$check_2= $check_2+1;
					}
				}
				
			}
			// dd($check_2);
		foreach ($mang_3 as $key => $m) {
				foreach ($mang as $k => $ma) {
					if ($m==$ma) {
						$check_3= $check_3+3;
					}
				}
				
			}
		foreach ($mang_4 as $key => $m) {
				foreach ($mang as $k => $ma) {
					if ($m==$ma) {
						$check_4= $check_4+4;
					}
				}
				
			}
			foreach ($mang_5 as $key => $m) {
				foreach ($mang as $k => $ma) {
					if ($m==$ma) {
						$check_5= $check_5+5;
					}
				}
				
			}
			foreach ($mang_6 as $key => $m) {
				foreach ($mang as $k => $ma) {
					if ($m==$ma) {
						$check_6= $check_6+6;
					}
				}
				
			}
			foreach ($mang_7 as $key => $m) {
				foreach ($mang as $k => $ma) {
					if ($m==$ma) {
						$check_7= $check_7+7;
					}
				}
				
			}
			foreach ($mang_8 as $key => $m) {
				foreach ($mang as $k => $ma) {
					if ($m==$ma) {
						$check_8= $check_8+8;
					}
				}
				
			}

			// dd($check_7);
			if ($check_1==1) {
				// dd(array_diff($mang_2,$mang));
				// array_diff($mang_2,$mang); lay ra phan tu khac nhau trong 2 mang
				$product = Product::where('id',array_diff($mang_1,$mang))->first();
				// dd($product);
			}elseif ($check_2==2) {
				$product = Product::where('id',array_diff($mang_2,$mang))->first();
			}elseif ($check_3==3) {
				// dd('abc');
				$product = Product::where('id',array_diff($mang_3,$mang))->first();
			}elseif ($check_4==4) {
				// dd('abc');
				$product = Product::where('id',array_diff($mang_4,$mang))->first();
			}elseif ($check_5==5) {
				// dd('abc');
				$product = Product::where('id',array_diff($mang_5,$mang))->first();
			}elseif ($check_6==6) {
				// dd('abc');
				$product = Product::where('id',array_diff($mang_6,$mang))->first();
			}elseif ($check_7==7) {
				// dd('abc');
				$product = Product::where('id',array_diff($mang_7,$mang))->first();
				// dd($product);
			}elseif ($check_8==8) {
				$product = Product::where('id',array_diff($mang_8,$mang))->first();
			}


		return view('home.cartview',
			[
				'cart'=> new Cart(),
				'pro'=>$product
			]);
	}



	public function add_cart($id, Cart $cart){
		$pro = Product::find($id);
		if($pro){
			$cart->add($pro);

			return redirect()->route('cartview')->with('success','thêm  mới giỏ hàng thành công');
		}

	}
	public function update_cart($id, Cart $cart){
		$quty = request()->quty > 0 ? request()->quty : 1;
		$cart->update($id,$quty);
		return redirect()->route('cartview')->with('success','thêm  mới giỏ hàng thành công');
	}
	public function remove_cart($id, Cart $cart){
		$cart->remove($id);
		return redirect()->back()->with('success','xóa sản phẩm thành công');
	}
	public function clear_cart(Cart $cart){
		$cart->clear();
		return redirect()->route('cartview')->with('success','xóa giỏ hàng thành công');
	}


	public function thay_doi_pass(){
		return view('home.thaydoi');
	}

	public function post_thaydoipass(Request $request){
			$this->validate($request,[
			'old_password'=>'required|check_old_pass_cus',
			'password'=>'required',
			'confirm_password'=>'required|same:password'
		],[
			'old_password.check_old_pass_cus'=>'mật khẩu cũ không chính xác',
			'password.required'=>'vui lòng nhập password',
			'confirm_password.required'=>'vui lòng nhập confỉrm_password',
			'confirm_password.same'=>'xác nhập password sai'
		]);
		// dd($request->all());
		if (Auth::guard('cus')->user()->update(['password'=>bcrypt($request->password)])) {
        Auth::guard('cus')->logout();
	      return redirect()->route('home_login')->with('succsess','thay đôi mật khẩu thành công');
	      }
	      else{
	         return redirect()->back()->with('error','Sửa khoản không thành công');
	      }
	}

	public function profile(){
		return view('home.profile');
	}

	public function eidt_profile(Request $request){
		if (Customer::where('id',Auth::guard('cus')->id())->update(['name'=>$request->name,
        'email'=>$request->email,
        'phone'=>$request->phone,
        'address'=>$request->address])) {
            return redirect()->route('home');
        }
	}

	public function slug($slug){
		$pro = Product::where('slug',$slug)->first();
		// dd($pro);
		return view('home.detail',[
			'pro'=>$pro
		]);
	}

	public function search(Request $request){
		// dd($request->all());
		$product = Product::where('name','LIKE','%'.$request->search_key.'%')->paginate(5);
		return view('home.search',[
			'product'=>$product
		]);
	}

	public function slug_category($slug){
		// dd($slug);
		$category = Category::where('slug',$slug)->first();
		if($category){
			$product = Product::orderBy('name','ASC')->where('category_id',$category->id)->get();
		}
		// dd($product);
		return view('home.slug_category',[
			'product'=>$product
		]);

	}

	public function news($slug){
		$news = News::where('slug',$slug)->first();
		return view('home.news',[
			'new'=>$news
		]);
	}

	public function error(){
		return view('home.error');
	}


	public function khuyendoc(){
		$product = Product::orderBy('id','DESC')->where('status',1)->where('quantity_now','>',0)->paginate(6);
		//top sản phâm
 		$mang = [];
 		$order = Order_detail::select('product_id')->distinct()->get();
 		foreach ($order as $key => $ord) {
 			// dd($ord->product_id);
 			$prod = Order_detail::where('product_id',$ord->product_id)->count();
 			if ($prod > 8) {
 				$maxproduct = Product::where('id',$ord->product_id)->first();
 				array_push($mang, $maxproduct);
 			}


 			
 		}
		return view('home.khuyendoc',[
			'product'=>$mang
		]);
	}

	public function post_comment($id,$slug,Request $request){
		$product = Product::where('id',$id)->first();
		// dd($product);
			 $request->merge(['customer_id'=> Auth::guard('cus')->id()]);
			 $request->merge(['product_id'=> $id]);
			 // dd($request->all());
			 if (Feedback::create($request->all())) {
			 	
			 	return redirect(url('/').'/'.$slug.'.html');
			 }else{
			    return view('home.detail');
			 	
			 }
	}


	

}
 ?>