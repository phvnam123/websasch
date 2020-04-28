<?php 
namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Model\publishers;
use ILLUminate\Http\Request;

Class publishersController extends Controller 
{

	public function index(){
		$publishers = publishers::paginate(5);
		return view ('publishers.index',[
			'publisher'=>$publishers	
		]);
	}

	public function create(){
		return view ('publishers.create');
	}

	public function post_create(Request $request){
		$this->validate($request,[
            'name' =>'required|unique:Publishers',
        ],[
            'name.required'=>'tên danh mục không được rỗng',
            'name.unique'=>'có sản phẩm rồi',
        ]);
		publishers::create($request->all());
		return redirect()->route('publishers')->with('succsess','thêm danh muc'.$request->name.'thành công');
	}

	public function publishers_delete($id){
		publishers::find($id)->delete();
		return redirect()->route('publishers')->with('success','xóa thành công');
	}

	public function publishers_all(Request $request){
		// dd($request->all());
		publishers::destroy($request->id);
		return redirect()->route('publishers')->with('success','xóa thành công');
	}

	public function edit($id){
		 $publisher = publishers::find($id);
		// dd($publisher);
		return view ('publishers.edit_publisher',[
			'pub'=>$publisher
		]);	
	}

	public function post_edit($id,Request $request){
		$this->validate($request,[
            'name' =>'required:Publishers',
        ],[
            'name.required'=>'tên nhà xuất bản không được rỗng',
        ]);
		publishers::find($id)->update($request->all());
		return redirect()->route('publishers')->with('success','sửa thành công');
	}
}

 ?>