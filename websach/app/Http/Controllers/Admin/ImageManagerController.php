<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Image;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;

/**
  * 
  */
 class ImageManagerController extends Controller
 {
 	
 	public function index(){
    $imge = Image::orderBy('name','ASC')->get();
 		// dd($imge);
 		return view('image.index',[
 			'imge'=>$imge
 		]);

 	}
 	//them danh sach
 	public function create(){
 		return view('image.create');
 	}

 	public function post_create(Request $request){
 	    $this->validate($request,[
            'name' =>'required|unique:image_manager'
        ],[
            'name.required'=>'tên danh mục không được rỗng',
            'name.unique'=>'có sản phẩm rồi',
        ]);
 	    if($request->hasFile('Img_upload')){
            $request->Img_upload->move(base_path('public/uploads'),$request->Img_upload->getClientOriginalName());
        }
        $request->merge(['image'=>$request->Img_upload->getClientOriginalName()]);
        $request->merge(['user_id'=> Auth::user()->id]);
 	    Image::create($request->all());
 	    return redirect()->route('image')->with('succsess','thêm ảnh thành công');
        // dd($request->all());
 	}
  public function edit_image($id){
    // $image = Image::orderBy('name','ASC')->where('id',$id)->get();
    $image = Image::find($id);
    // dd($image);
    return view('image.edit',[
      'image'=>$image
    ]);
  }

  public function post_edit_create(Request $request, $id){
      $image = Image::find($id);
      $this->validate($request,[
            'name' =>'required|unique:image_manager,name,' .$id
        ],[
            'name.required'=>'tên ảnh không được rỗng',
            'name.unique'=>'có tên ảnh rồi',
        ]);
      $img = $image->image;
        if($request->hasFile('Img_upload')){
          $request->Img_upload->move(base_path('public/uploads'),$request->Img_upload->getClientOriginalName());
          $img = $request->Img_upload->getClientOriginalName();
        }
        $request->merge(['image'=>$img]);
        $request->merge(['user_id'=> Auth::user()->id]);
      Image::find($id)->update($request->all());
      return redirect()->route('image')->with('succsess','thêm ảnh thành công');
        // dd($request->all());
  }

  public function image_delete($id){
    $image = Image::find($id)->delete();
    if ($image) {
    return redirect()->route('image')->with('succsess','xóa thành công');
    }else{
      return redirect()->route('image')->with('succsess','xóa thành công');
    }
  }


 }
  ?>