<?php 
namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Str;

use Auth;

/**
 * 
 */
class UserController extends Controller
{
	
	// function __construct(argument)
	// {
	// 	# code...
	// }

	public function index(){
		$user = User::orderby('name','ASC')->get();
		// dd($user);
		return view('user.index',[
			'user'=>$user
		]);
	}

	public function create(){
		return view('user.user_create');
	}

	public function post_create(request $request){
		$this->validate($request,[
			'name'=>'required',
			'email'=>'required|email|unique:user,email',
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
		// $user = User::create($request->all());
		if(User::create($request->all())){
			return redirect()->route('user')->with('success','thêm  user thành công');
		}else{
			return redirect()->back()->with('error','thêm user không thành công');
		}

	}
	public function user_delete($id){
			User::find($id)->delete();
			return redirect()->route('user')->with('success','xóa thành công');
	}


	public function login(){
		return view('user.login');
	}

	public function post_login(request $request){
		// dd($request->all());
		if(Auth::attempt($request->only('email','password'),$request->has('remember'))){
			return redirect()->route('admin')->with('success','chào mừng quay trở lại');
		}else{
			return redirect()->back()->with('error','đăng nhập không thành công');
		}
	}


	public function logout(){
		Auth::logout();
		return redirect()->route('login')->with('success','thoát thành công');
	}


	public function change_password(){
		return view('user.chang_password');
	}

	public function post_change_password(Request $request){
		$this->validate($request,[
			'old_password'=>'required|check_old_password',
			'password'=>'required',
			'confirm_password'=>'required|same:password'
		],[
			'old_password.check_old_password'=>'mật khẩu cũ không chính xác',
			'password.required'=>'vui lòng nhập password',
			'confirm_password.required'=>'vui lòng nhập confỉrm_password',
			'confirm_password.same'=>'xác nhập password sai'
		]);
	// dd($request->all());
		if(Auth::user()->update(['password'=>bcrypt($request->password)])){
			Auth::logout();
			return redirect()->route('login')->with('success','thay đổi mật khẩu thành công');
		}else{
			return redirect()->route('change_password')->with('error','thay đổi mật khẩu không thành công thành công');
		}
	}

}

 ?>