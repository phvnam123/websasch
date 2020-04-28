<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\category;
use Illuminate\Http\Request;

/**
  * 
  */
 class categoryController extends Controller
 {
 	
 	public function index(){

 		$cat = category::paginate(10);
 		// dd($cat);
 		return view('category.index',[
 			'cats'=>$cat
 		]);

 	}
 	//them danh sach
 	public function create(){
 		return view('category.create');
 	}

 	public function post_create(Request $request){
 	    $this->validate($request,[
            'name' =>'required|unique:Category',
            'slug' =>'required|unique:Category'
        ],[
            'name.required'=>'tên danh mục không được rỗng',
            'name.unique'=>'có sản phẩm rồi',
            'slug.required'=>'slug không được rỗng',
            'slug.unique'=>'có sản phẩm rồi'
        ]);
 	    // $cat_1 = category::select('name','slug')->where(
 	    // 	'name',$request->name
 	    // )->orwhere('slug',$request->slug);
 	 //    if ($cat_1) {
 	 //    	return response()->json(['success'=>'thêm không thành công']);
 	 //    }else{
 	 //    	$cat = category::create($request->all());
 		// if($cat){
 		// 	return response()->json(['success'=>'thêm thành công']);
 		// }
 	 //    }
 	    category::create($request->all());
 	    return redirect()->route('category')->with('succsess','thêm danh mục thành công');


 		
 		
 	}

 	//xoa danh sach
 	public function delete($id){
 		// DB::table('category')->delete($id);
 		if (category::find($id)->delete()) {
 			return redirect()->route('category')->with('succsess','xóa danh mục thành công');
 		}
 		
 	}
 	public function delete_all(Request $request){
        dd($request->id);
 		category::destroy($request->id);
 		return redirect()->route('category')->with('succsess','xóa danh mục thành công');
 	}

 	public function edit($id){
 		$cat = category::find($id);
 		return view ('category.edit',[
 			'cats'=>$cat
 		]);
 	}


 	public function post_edit($id,Request $request){
                $this->validate($request,[
                'name'=>'required:unique:Category,name,'.$id
            ],[
                'name.required'=>'Tên danh mục không được trống',
                'name.unique'=>'Tên danh đã tồn tại ',

            ]);
 		category::find($id)->update($request->all());
 		return redirect()->route('category')->with('succsess','update danh mục thành công');   
 }

 }
  ?>