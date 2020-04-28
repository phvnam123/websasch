<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\News;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;

/**
  * 
  */
 class NewController extends Controller
 {
 	
 	public function index(){
    $new = News::all();
 		// dd($new);
 		return view('new.index',[
 			'new'=>$new
 		]);

 	}
 	//them danh sach
 	public function create(){
 		return view('new.create');
 	}

 	public function post_create(Request $request){
 	    $this->validate($request,[
        'title'=>'required',
        'description'=>'required',
        'slug'=>'required',
        'Img_upload'=>'required',
        'full'=>'required'

      ],[
        'title.required'=>'title không được rỗng',
        'description.required'=>'Hãy nhập mô tả',
        'slug.required'=>'Nhập giá tiền',
        'Img_upload.required'=>'Nhập ảnh',
        'full.required'=>'Nhập text',
        ]);
 	    if($request->hasFile('Img_upload')){
            $request->Img_upload->move(base_path('public/uploads'),$request->Img_upload->getClientOriginalName());
        }
        $request->merge(['image'=>$request->Img_upload->getClientOriginalName()]);
        $request->merge(['user_id'=> Auth::user()->id]);
        // dd($request->all());
 	    News::create($request->all());
 	    return redirect()->route('new')->with('succsess','thêm ảnh thành công');
 	}

    public function edit($id){
        $news = News::find($id);
        return view('new.edit',[
            'new'=>$news
        ]);
    }
    public function post_edit($id, Request $request){
        $new = News::find($id);
        $this->validate($request,[
                'title'=>'required',
                'description'=>'required',
                'slug'=>'required',
                'full'=>'required'

              ],[
                'title.required'=>'title không được rỗng',
                'description.required'=>'Hãy nhập mô tả',
                'slug.required'=>'Nhập giá tiền',
                'full.required'=>'Nhập text',
                ]);
        $img = $new->image;
        if($request->hasFile('Img_upload')){
            $request->Img_upload->move(base_path('public/uploads'),$request->Img_upload->getClientOriginalName());
            $img = $request->Img_upload->getClientOriginalName();
        }
        $request->merge(['image'=>$img]);
        News::find($id)->update($request->all());
        return redirect()->route('new')->with('succsess','thêm ảnh thành công');
    }

    public function new_delete($id){
        $news = News::find($id)->delete();
        if ($news) {
        return redirect()->route('new')->with('succsess','xóa thành công');
        }else{
            return redirect()->route('new')->with('error','xóa không thành công');
        }
    }

 }
  ?>