<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::group([
	'prefix'=>'/',
	'middleware'=>'checkAuth'
], function(){
Route::group([
	'middleware'=>'checkAdmin',
], function(){
Route::group(['prefix'=>'admin'], function(){
	Route::group(['prefix'=>'category'], function(){
		// admin/theloai/danhsach
		Route::get('list', 'CategoryController@getList')->name('Category.list');

		Route::get('edit/{id}', 'CategoryController@getEdit')->name('Category.edit');
		Route::post('upload/{id}', 'CategoryController@postEdit')->name('Category.upload');

		Route::get('add', 'CategoryController@getAdd')->name('Category.add');
		Route::post('create','CategoryController@postAdd')->name('Category.create');

		Route::get('delete/{id}', 'CategoryController@getDelete');
	});
	
	Route::group(['prefix'=>'product'], function(){
		// admin/product/list
		Route::get('list', 'ProductController@getList')->name('Product.list');

		Route::get('edit/{pro_id}', 'ProductController@getEdit')->name('Product.edit');
		Route::post('upload/{pro_id}', 'ProductController@postEdit');

		Route::get('add', 'ProductController@getAdd')->name('Product.add');
		Route::post('create','ProductController@postAdd')->name('Product.post');

		Route::get('delete/{id}', 'ProductController@getDelete');
	});
	Route::group(['prefix'=>'slide'], function(){
		// admin/product/list
		Route::get('list', 'SlideController@getList')->name('Slide.list');

		Route::get('edit/{id}', 'SlideController@getEdit')->name('Slide.edit');
		Route::post('upload/{id}', 'SlideController@postEdit');

		Route::get('add', 'SlideController@getAdd')->name('Slide.add');
		Route::post('create','SlideController@postAdd')->name('Slide.create');

		Route::get('delete/{id}', 'SlideController@getDelete');
	});
	Route::group(['prefix'=>'user'], function(){
		// admin/product/list
		Route::get('/', 'UserController@getList')->name('User.list');

		Route::get('delete/{id}', 'UserController@getDelete')->name('delete');
	});
});
	Route::group(['prefix'=>'font'], function(){
		Route::get('/' ,'HomeController@index')->name('Font');
		Route::get('product_type/{id}','HomeController@catePro')->name('Font.product_type');
		Route::get('add-cart/{id}', 'HomeController@getAddCart')->name('Font.add-cart');
		Route::get('dele-cart/{id}', 'HomeController@getDelItemCart')->name('Font.del-cart');
		Route::get('dat-hang2', 'HomeController@postCheckout')->name('dat-hang');
	});
});
});
Route::get('search', 'Homecontroller@search')->name('search');
Route::get('login','AuthController@showLogin')->name('Auth.showLogin');
Route::post('login', 'AuthController@login')->name('auth.loginPost');
Route::get('dangxuat', 'AuthController@logOut')->name('auth.dangxuat');
Route::get('dangki', 'HomeController@dangki')->name('dangki');
Route::post('dangki', 'HomeController@Postdangki')->name('postdangki');
Route::get('xem-san-pham/{id}.html', 'ProductController@getID');