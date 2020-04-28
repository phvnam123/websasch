<?php 
namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Model\product;
use App\Model\category;
use App\Model\publishers;
use App\Model\pruchases;
use ILLUminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;

Class ProductController extends Controller 
{

	public function index(){

		$product = Product::orderBy('id','DESC')->where('status',1)->where('quantity_now','>',0)->paginate(6);
		// dd($pro->img);
		return view ('product.index',[
			'prod'=>$product
		]);
	}

	public function product_create(){
		$cat = Category::orderBy('name','ASC')->get();
		$publishers = Publishers::orderBy('name','ASC')->get();
		$pruchases = Pruchases::orderBy('MADH','ASC')->get();
		// dd($cat);
		return view ('product.product_create',[
			'cat'=>$cat,
			'pub'=>$publishers,
			'pruchases'=>$pruchases
		]);
	}

	public function product_post_create(Request $request){
		// dd($request->all());
        $this->validate($request,[
				'name' =>'required|unique:Product',
	            'slug' =>'required|unique:Product',
				'publishers_id'=>'required',
				'category_id'=>'required',
				'price'=>'required',
				'quantity'=>'required',
				'status'=>'required',
				'Img_upload'=>'required',
				'writer_name'=>'required',
				'about'=>'required'
			],[
				'name.required'=>' Không được trống',
				'slug.required'=>' Không được trống',
				'price.required'=>' Không được trống',
				'status.required'=>' Không được trống',
				'note.required'=>' Không được trống',
				'Img_upload.required'=>'Không được trống'
			]);
		// dd('acc'); 
        if($request->hasFile('Img_upload')){
        	$request->Img_upload->move(base_path('public/uploads'),$request->Img_upload->getClientOriginalName());
        }
        $request->merge(['image'=>$request->Img_upload->getClientOriginalName()]);
        $request->merge(['quantity_now'=>$request->quantity]);
        $request->merge(['user_id'=> Auth::user()->id]);
        product::create($request->all());
 	    return redirect()->route('product')->with('succsess','thêm danh mục thành công');
	}
	public function product_edit($id){
		$pro = Product::find($id);
		$cat = Category::orderBy('name','ASC')->get();
		$publishers = Publishers::orderBy('name','ASC')->get();
		return view('product.product_edit',[
			'pro'=>$pro,
			'cat'=>$cat,
			'pub'=>$publishers
		]);
	}
	public function product_post_edit($id , Request $request){
		 $pro = Product::find($id);
		 $this->validate($request,[
				'name'=>'required|unique:product,name,'.$id,
	            'slug'=>'required|unique:product,slug,'.$id,
				'publishers_id'=>'required',
				'category_id'=>'required',
				'price'=>'required',
				'quantity'=>'required',
				'status'=>'required',
				'writer_name'=>'required',
				'about'=>'required'
			],[
				'name.required'=>'Tên danh mục không được trống',
                'name.unique'=>'Tên danh đã tồn tại ',
				'slug.required'=>' Không được trống',
				'slug.unique'=>' tên slug đã tồn tại',
				'price.required'=>' Không được trống',
				'quantity.required'=>' Không được trống',
				'category_id.required'=>' Không được trống',
				'publishers_id.required'=>' Không được trống',
				'status.required'=>' Không được trống',
				'about.required'=>' Không được trống'
			]);
		$img = $pro->image;
        if($request->hasFile('Img_upload')){
        	$request->Img_upload->move(base_path('public/uploads'),$request->Img_upload->getClientOriginalName());
        	$img = $request->Img_upload->getClientOriginalName();
        }
        $request->merge(['image'=>$img]);
        $request->merge(['quantity_now'=>$request->quantity]);
        // dd($request->all());
        product::find($id)->update($request->all());
 	    return redirect()->route('product')->with('succsess','thêm danh mục thành công');
	}
	public function delete($id){
		// dd($id);
		$pro = product::find($id)->delete();
		if ($pro) {
		return redirect()->route('product')->with('succsess','xóa thành công');
		}else{
			return redirect()->route('product')->with('succsess','xóa thành công');
		}
	}

	public function delete_all(Request $request){
		// $id = $request->all();
		// dd($request->id);
		product::destroy($request->id);
		return redirect()->route('product')->with('succsess','xóa thành công');
	}

	public function create_get_product(Request $request){
		$cat = Category::orderBy('name','ASC')->get();
		$publishers = Publishers::orderBy('name','ASC')->get();
		$pruchases = Pruchases::orderBy('MADH','ASC')->get();
		// dd($cat);
		return json_encode([
			'cat' => $cat,
			'publisher' => $publishers,
			'pruchases' => $pruchases
		]);
	}

	public function create_post_product(Request $request){
		$request->merge(['quantity'=>$request->quantity_now]);
        // $request->merge(['image'=>$img]);
		$request->merge(['user_id'=> Auth::user()->id]);
        // return json_encode($request->all());
		$pro = Product::create($request->all());
		// return json_encode($request->all());
		return response()->json(['success'=>'record is successfully create']);
	}
}

 ?>