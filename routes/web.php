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
// front-end**********************************************************************

Route::get('/','HomeController@index');
Route::get('/home','HomeController@index');
Route::post('/search','HomeController@search');
//Hiển thị người dùng=================================================================
Route::get('/danh-muc-san-pham/{category_id}','HomeController@detail_category');
Route::get('/thuong-hieu-san-pham/{brand_id}','HomeController@detail_brand');
Route::get('/detail/{product_id}','HomeController@detail_product');
Route::post('/save_card','ShopController@save_card');
Route::post('/update_cart_quatity','ShopController@update_cart_quatity');
Route::get('/show_card','ShopController@show_card');
Route::get('/delete_to_cart/{rowId}','ShopController@delete_to_cart');
//thanh toan
Route::get('/login-checkout','ShopController@login_checkout');
Route::get('/logout-checkout','ShopController@logout_checkout');
Route::post('/register_cuctomer','ShopController@register_cuctomer');
Route::get('/checkout','ShopController@checkout');
Route::get('/payment','ShopController@payment');
Route::post('/save_checkout_cuctomer','ShopController@save_checkout_cuctomer');
Route::post('/login-cuctomer','ShopController@login_cuctomer');//login account
Route::post('/order-place','ShopController@order_place');
// back-end**********************************************************************

Route::get('/adminlogin','AdminController@index');
Route::get('/dashboard','AdminController@show_dashboard');
Route::post('/admin-dashboard','AdminController@login');//xử lý form đăng nhập action login
Route::get('/logout','AdminController@logout');//logout
//category product
Route::get('/addcategory_products','CategoriController@addcategory_products');//thêm sản phẩm
Route::get('/allcategory_product','CategoriController@allcategory_product');//liệt kê sản phẩm
Route::post('/save_category_product','CategoriController@save_category_product');//thêm sản phẩm
//ẩn hiện category product
Route::get('/show_category/{category_id}','CategoriController@show_category')->name('category.show');//hiện
Route::get('/hiden_category/{category_id}','CategoriController@hiden_category')->name('category.hide');//ẩn
//edit category product
Route::get('/edit_category_product/{edit}','CategoriController@edit_category_product');
Route::post('/update_category_product/{update}','CategoriController@update_category_product');
//delete category product
Route::get('/delete_category_product/{delete}','CategoriController@delete_category_product');

//thương hiệu sản phẩm=====================================================================

Route::get('/addbrand_product','BrandController@addbrand_product');
Route::get('/allbrand_product','BrandController@allbrand_product');
Route::post('/save_brand_product','BrandController@save_brand_product');//thêm sản phẩm
//edit brand product
Route::get('/edit_brand_product/{edit}','BrandController@edit_brand_product');
Route::post('/update_brand_product/{update}','BrandController@update_brand_product');
//ẩn hiện brand product
Route::get('/show_brand/{brand_id}','BrandController@show_brand')->name('brand.show');//hiện
Route::get('/hiden_brand/{brand_id}','BrandController@hiden_brand')->name('brand.hide');//ẩn
//delete brand product
Route::get('/delete_brand_product/{delete}','BrandController@delete_brand_product');

//Product=========================================================================================
Route::get('/add_product','ProductController@add_product');
Route::get('/all_product','ProductController@all_product');
Route::post('/save_product','ProductController@save_product');//thêm sản phẩm
//edit Product 
Route::get('/edit_product/{edit}','ProductController@edit_product');
Route::post('/update_product/{update}','ProductController@update_product');
//ẩn hiện Product 
Route::get('/show_product/{product_id}','ProductController@show_product')->name('product.show');//hiện
Route::get('/hiden_product/{product_id}','ProductController@hiden_product')->name('product.hide');//ẩn
//delete Product 
Route::get('/delete_product/{delete}','ProductController@delete_product');
