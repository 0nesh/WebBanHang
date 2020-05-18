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
//frontend
Route::get('/', 'HomeController@index');

Route::get('trang-chu', 'HomeController@index');
Route::post('tim-kiem', 'HomeController@search');

//danh mục
Route::get('danh-muc-san-pham/{category_id}', 'CategoryProduct@show_category_home');


//thương hiệu
Route::get('thuong-hieu-san-pham/{brand_id}', 'brandController@show_brand_home');


//chi tiết sản phẩm
Route::get('chi-tiet-san-pham/{category_id}', 'productController@show_details');

//backend
Route::get('/admin', 'AdminController@index');

Route::get('/dashboard', 'AdminController@show_dashboard');

Route::get('/logout', 'AdminController@logout');

Route::post('/admin-dashboard', 'AdminController@dashboard');

//caregory
//add
Route::get('/Add-Category', 'CategoryProduct@add_category');
Route::post('/save-category', 'CategoryProduct@save_category');

Route::get('/All-Category', 'CategoryProduct@all_category');

//edit
Route::get('/Edit-Category/{category_product_id}', 'CategoryProduct@edit_category');
Route::post('/update-category/{category_product_id}', 'CategoryProduct@update_category');

//delete
Route::get('/Del-Category/{category_product_id}', 'CategoryProduct@del_category');

//brand
//add
Route::get('/Add-Brand', 'brandController@add_brand');
Route::post('/save-Brand', 'brandController@save_brand');

Route::get('/All-Brand', 'brandController@all_brand');

//edit
Route::get('/Edit-Brand/{Brand_product_id}', 'brandController@edit_brand');
Route::post('/update-Brand/{Brand_product_id}', 'brandController@update_brand');

//delete
Route::get('/Del-Brand/{Brand_product_id}', 'brandController@del_brand');


//product
//add
Route::get('/Add-Product', 'productController@add_product');
Route::post('/Save-Product', 'productController@save_product');

Route::get('/All-Product', 'productController@all_product');

//edit
Route::get('/Edit-Product/{Product_id}', 'productController@edit_product');
Route::post('/Update-Product/{Product_id}', 'productController@update_product');

//delete
Route::get('/Del-Product/{Product_id}', 'productController@del_product');

//cart
Route::get('/Show-Cart', 'CartController@show_cart');
Route::post('/save-cart','CartController@save_cart');
Route::get('/Del-Cart/{id}', 'CartController@del_cart');
Route::post('/quantity-update', 'CartController@quantity_update');

//login check
Route::get('/login-checkout', 'CheckOutController@login_checkout');
Route::get('/payment', 'CheckOutController@payment');
Route::post('/add-customer', 'CheckOutController@add_customer');
Route::get('/logout-checkout', 'CheckOutController@logout_checkout');
Route::get('/checkout', 'CheckOutController@checkout');
Route::get('/account-customer/{custumer_id}', 'CheckOutController@account_customer');

Route::post('/save-checkout-customer', 'CheckOutController@save_checkout_customer');


Route::post('/customer-login', 'CheckOutController@customer_login');

Route::post('/order-place', 'CheckOutController@order_place');
