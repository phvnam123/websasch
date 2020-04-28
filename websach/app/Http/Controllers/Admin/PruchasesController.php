<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Pruchases;
use App\User;

/**
 * 
 */
class PruchasesController extends Controller
{
	
	// function __construct(argument)
	// {
	// 	# code...
	// }
	public function index(){
		$pruchases = Pruchases::all();
		// dd($pruchases);
		return view('pruchases.index',[
			'pruchases'=>$pruchases
		]);
	}

	public function create(){
		return view ('pruchases.create');
	}
	public function post_create(Request $request){
		$this->validate($request,[
				'MADH'=>'required:unique:pruchases',
				'order_date'=>'required',
				'delivery_date'=>'required',
				'total_money'=>'required|numeric',
				'notes'=>'required'

			],[
				'MADH.required'=>'Tên mã đơn hàng không được trống',
				'order_date.required'=>'Hãy nhập ngày nhập hàng',
				'delivery_date.required'=>'Hãy nhập ngày nhập hàng',
				'total_money.required'=>'Nhập giá tiền',
				'notes.required'=>'Nhập ghi chú',
				'MADH.unique'=>'Tên danh đã tồn tại ',
				'total_money.numeric'=>'Phải nhập số '
				

			]);
		$request->merge(['user_id'=>auth::user()->id]);
		// dd($request->all());
		Pruchases::create($request->all());
 	    return redirect()->route('pruchases')->with('succsess','thêm danh mục thành công');
	}

	public function edit($id){
		$pruchases = Pruchases::find($id);
		return view('pruchases.edit',[
			'pruchases'=>$pruchases
		]);
	}
	public function post_edit($id, Request $request){
		$pruchases = Pruchases::find($id);
		$this->validate($request,[
				'MADH'=>'required|unique:pruchases,MADH,'.$id,
				'order_date'=>'required',
				'delivery_date'=>'required',
				'total_money'=>'required|numeric',
				'notes'=>'required'

			],[
				'MADH.unique'=>'Tên danh đã tồn tại ',
				'MADH.required'=>'Tên mã đơn hàng không được trống',
				'order_date.required'=>'Hãy nhập ngày nhập hàng',
				'delivery_date.required'=>'Hãy nhập ngày nhập hàng',
				'total_money.required'=>'Nhập giá tiền',
				'notes.required'=>'Nhập ghi chú',
				'total_money.numeric'=>'Phải nhập số '
				

			]);
			$request->merge(['user_id'=>auth::user()->id]);
			// dd($request->all());
			pruchases::find($id)->update($request->all());
			return redirect()->route('pruchases')->with('update','thêm đơn hàng nhập thành công'); 
	}

	public function delete($id){
		// dd($id);
		pruchases::find($id)->delete();
		return redirect()->route('pruchases')->with('success','xóa thành công đơn hàng nhập');
	}
}


 ?>