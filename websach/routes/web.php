<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>'auth'],function(){
	Route::get('/','HomeController@index')->name('admin');

	Route::get('/category','CategoryController@index')->name('category');
	Route::get('/category_delete/{id}','CategoryController@delete')->name('category_delete');
	Route::post('/category_delete_all}','CategoryController@delete_all')->name('category_delete_all');
	Route::get('category_create','CategoryController@create')->name('category_create');
	Route::post('category_create','CategoryController@post_create');
	Route::get('category_edit/{id}','CategoryController@edit')->name('category_edit');
	Route::post('category_edit/{id}','CategoryController@post_edit');

	//Route produce
	Route::get('/product','ProductController@index')->name('product');
	Route::get('product_create','ProductController@product_create')->name('product_create');
	Route::post('product_create','ProductController@product_post_create');
	Route::get('product_edit/{id}','ProductController@product_edit')->name('product_edit');
	Route::post('product_edit/{id}','ProductController@product_post_edit');
	Route::get('/product_delete/{id}','ProductController@delete')->name('product_delete');
	Route::post('/product_delete_all','ProductController@delete_all')->name('product_delete_all');

	//product ajax
	Route::get('/create_getproduct','ProductController@create_get_product');
	Route::post('/create_post_getproduct','ProductController@create_post_product');


	//Route publishers
	Route::get('/publishers','PublishersController@index')->name('publishers');
	Route::get('/publishers_create','PublishersController@create')->name('publishers_create');
	Route::post('/publishers_create','PublishersController@post_create');
	Route::get('/publishers_delete/{id}','PublishersController@publishers_delete')->name('publishers_delete');
	Route::post('/publishers_delete_all','PublishersController@publishers_all')->name('publishers_delete_all');
	Route::get('/publishers_edit/{id}','PublishersController@edit')->name('publishers_edit');
	Route::post('/publishers_edit/{id}','PublishersController@post_edit');

	//route user
	Route::get('/user','UserController@index')->name('user');
	Route::get('/user_create','UserController@create')->name('user_create');
	Route::post('/user_create','UserController@post_create');
	Route::get('/user_delete/{id}','UserController@user_delete')->name('user_delete');
	Route::get('/logout','UserController@logout')->name('logout');
	Route::get('/change_password','UserController@change_password')->name('change_password');
	Route::post('/change_password','UserController@post_change_password');

	//route pruchases
	Route::get('/pruchases','PruchasesController@index')->name('pruchases');
	Route::get('/pruchases_create','PruchasesController@create')->name('pruchases_create');
	Route::post('/pruchases_create','PruchasesController@post_create') ;
	Route::get('/pruchases_edit/{id}','PruchasesController@edit')->name('pruchases_edit');
	Route::post('/pruchases_edit/{id}','PruchasesController@post_edit') ;
	Route::get('/pruchases_delete/{id}','PruchasesController@delete')->name('pruchases_delete');
	Route::post('/pruchases_delete_all}','PruchasesController@delete_all')->name('pruchases_delete_all');


	//image manager
	Route::get('image','ImageManagerController@index')->name('image');
	Route::get('image_create','ImageManagerController@create')->name('create_image');
	Route::post('image_create','ImageManagerController@post_create');
	Route::get('image_edit/{id}','ImageManagerController@edit_image')->name('edit_image');
	Route::post('image_edit/{id}','ImageManagerController@post_edit_create');
	Route::get('image_delete/{id}','ImageManagerController@image_delete')->name('image_delete');


	///news
	Route::get('new','NewController@index')->name('new');
	Route::get('new_create','NewController@create')->name('new_create');
	Route::post('new_create','NewController@post_create');
	Route::get('new_edit/{id}','NewController@edit')->name('new_edit');
	Route::post('new_edit/{id}','NewController@post_edit');
	Route::get('new_delete/{id}','NewController@new_delete')->name('new_delete');

	//order
	Route::get('order','OrderController@index')->name('order-admin');
	Route::get('order/{id}','OrderController@order_detail')->name('order-admin-detail');
	Route::get('order-pendding/{id}','OrderController@Order_pendding')->name('order-pendding');
	Route::post('/order_delete_all','OrderController@delete_all')->name('order_delete_all');


});

//dang nhap admin
Route::get('admin/login','Admin\UserController@login')->name('login');
Route::post('admin/login','Admin\UserController@post_login')->name('login');



//trang home nguoi dung
Route::get('/','FrontendController@index')->name('home');
Route::get('/customer','FrontendController@create_customer')->name('register');
Route::post('/customer','FrontendController@post_create_customer');
Route::get('/login','FrontendController@login')->name('home_login');
Route::post('/login','FrontendController@post_login');
Route::get('/logout','FrontendController@logout')->name('home_logout');
Route::get('/thaydoipass','FrontendController@thay_doi_pass')->name('thaydoipass');
Route::post('/thaydoipass','FrontendController@post_thaydoipass');
Route::get('profile','FrontendController@profile')->name('profile');
Route::post('/profile','FrontendController@eidt_profile');
Route::get('//{slug}.html','FrontendController@slug')->name('productV');
Route::get('search','FrontendController@search')->name('search');
Route::get('/category/{slug}','FrontendController@slug_category')->name('slug-category');
Route::get('/news/{slug}','FrontendController@news')->name('news');
Route::get('/khuyendoc','FrontendController@khuyendoc')->name('khuyendoc');
Route::get('/error}','FrontendController@error')->name('error');
Route::post('comment/{id}/{slug}','FrontendController@post_comment')->name('post_comment');

//gio hang
Route::get('/cart','FrontendController@cartview')->name('cartview');
Route::get('/add-cart/{id}','FrontendController@add_cart')->name('add-cart');
Route::get('/update-cart/{id}','FrontendController@update_cart')->name('update-cart');
Route::get('/remove-cart/{id}','FrontendController@remove_cart')->name('remove-cart');
Route::get('/clear-cart','FrontendController@clear_cart')->name('clear-cart');



//order 
Route::get('/order','OrderController@index')->name('order');
Route::post('/order','OrderController@post_order')->name('order');
Route::get('/order-success','OrderController@order_success')->name('order-success');
Route::get('/order-error','OrderController@order_error')->name('order-error');
Route::get('/order-history','OrderController@order_history')->name('order-history');
Route::get('/detail/{id}','OrderController@order_detail')->name('order-detail');

///thuat toan
Route::get('apriori','AprioriController@Apriori')->name('Apriori');