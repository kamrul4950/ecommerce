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

Route::get('/', 'Pagecontrol@index')->name('index');
Route::get('/contact','Pagecontrol@contact')->name('contact');
Route::get('/product','ProductController@product')->name('product');
Route::get('/search','Pagecontrol@search')->name('search');
Route::get('/category/{id}','CategoryShowByproduct@show')->name('category.show');

/*Fontend Controller route start here*/
Route::get('/show/{slug}','ProductController@single_product_show')->name('product.show');
/*Fontend Controller route end here*/

/*Admin Route Start Here*/

Route::group(['prefix'=> 'dashbord'],function(){
	Route::get('/','AdminController@index')->name('admin.index');
	

	/*Product Route Start here*/
	Route::group(['prefix'=> '/products'],function(){

			Route::get('/','AdminPageController@all_products')->name('admin.product.all');
			Route::get('/create','AdminPageController@product_create')->name('admin.product.create');
			Route::get('/edit/{id}','AdminPageController@product_edit')->name('admin.product.edit');
			Route::post('/store','AdminPageController@product_store')->name('admin.product.store');
			Route::post('/product/update/{id}','AdminPageController@product_update')->name('admin.product.update');
			Route::post('/product/delete/{id}','AdminPageController@product_delete')->name('admin.product.delete');
	});
	/*Product Route End Here*/
	/*Category Route Start Here*/
	Route::group(['prefix'=> '/categoryes'],function(){

			Route::get('/','CategoryController@index')->name('admin.category');

			Route::get('/create','CategoryController@category_create')->name('admin.category.create');

			Route::get('/edit/{id}','CategoryController@category_edit')->name('admin.category.edit');

			Route::post('/store','CategoryController@category_store')->name('admin.category.store');

			Route::post('/category/update/{id}','CategoryController@category_update')->name('admin.category.update');

			Route::post('/category/delete/{id}','CategoryController@category_delete')->name('admin.category.delete');

	});

	/*Category Route End Here*/
	/*Brand Route start here*/

	Route::group(['prefix'=>'/brands'],function(){
		Route::get('/','BrandController@index')->name('admin.brands');
		Route::get('/create','BrandController@create')->name('admin.brand.create');
		Route::post('/store','BrandController@store')->name('admin.brand.store');
		Route::get('/edit/{id}','BrandController@edit')->name('admin.brand.edit');
		Route::post('/update/{id}','BrandController@update')->name('admin.brand.update');
		Route::post('/delete/{id}','BrandController@delete')->name('admin.brand.delete');
		
	});
	/*Brand Route end here*/

	/*Division Route Start here*/
	Route::group(['prefix'=>'/division'],function(){
		Route::get('/','DivisionController@index')->name('admin.division');
		Route::get('/create','DivisionController@create')->name('admin.division.create');
		Route::post('/store','DivisionController@store')->name('admin.division.store');
		Route::get('/edit/{id}','DivisionController@edit')->name('admin.division.edit');
		Route::post('/update/{id}','DivisionController@update')->name('admin.division.update');
		Route::post('/delete/{id}','DivisionController@delete')->name('admin.division.delete');
	});
	/*Division Route End here*/
	/*District Route start here*/
	Route::group(['prefix'=>'/district'],function(){
		Route::get('/','DisrictController@index')->name('admin.district');
		Route::get('/create','DisrictController@create')->name('admin.district.create');
		Route::post('/store','DisrictController@store')->name('admin.district.store');
		Route::get('/edit/{id}','DisrictController@edit')->name('admin.district.edit');
		Route::post('/update/{id}','DisrictController@update')->name('admin.district.update');
		Route::post('/delete/{id}','DisrictController@delete')->name('admin.district.delete');
	});
	/**/
});


/*Admin Route End Here*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
