<?php

///*
//|--------------------------------------------------------------------------
//| Web Routes
//|--------------------------------------------------------------------------
//|
//| Here is where you can register web routes for your application. These
//| routes are loaded by the RouteServiceProvider within a group which
//| contains the "web" middleware group. Now create something great!
//|
//*/


Route::get('/','FrontIndexController@homeIndex');
Route::get('/product-category/{id}','FrontIndexController@productCategory');
Route::get('/product-details/{id}','FrontIndexController@productDetails');

/*>>>>>>>>>>>>>>>>>>>>>>>For Cart<<<<<<<<<<<<<*/

Route::post('/add-to-cart','CartController@addToCart');
Route::get('/show-cart','CartController@showCartProduct');
Route::post('/update-cart-product','CartController@updateCartProduct');
Route::get('/delete-cart-product/{id}','CartController@deleteCartProduct');

/*>>>>>>>>>>>>>>>>>>>>>>>For Checkout<<<<<<<<<<<<<*/

Route::get('/checkout','CheckoutController@index');
Route::post('/new-customer','CheckoutController@saveCustomerInfo');
Route::get('/shipping-info','CheckoutController@showShippingInfo');
Route::post('/customer-logout','CheckoutController@customerLogout')->name('customer-logout');
Route::post('/customer-login','CheckoutController@customerLoginCheck');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

/*Category Info*/

Route::get('/category/add-category', 'CategoryController@addCategoryInfo');
Route::post('/category/new-category', 'CategoryController@saveCategoryInfo');
Route::get('/category/manage-category', 'CategoryController@manageCategoryInfo');
Route::get('/category/published-category/{id}', 'CategoryController@publishedCategoryInfo');
Route::get('/category/unpublished-category/{id}', 'CategoryController@unpublishedCategoryInfo');
Route::get('/category/edit-category/{id}', 'CategoryController@editCategoryInfo');
Route::post('/category/update-category', 'CategoryController@updateCategoryInfo');
Route::get('/category/delete-category/{id}', 'CategoryController@deleteCategoryInfo');

/*Category Info*/

/*Brand Info*/

Route::get('/brand/add-brand', 'BrandController@addBrandInfo');
Route::post('/brand/new-brand', 'BrandController@saveBrandInfo');
Route::get('/brand/manage-brand', 'BrandController@manageBrandInfo');
Route::get('/brand/published-brand/{id}', 'BrandController@publishedBrandInfo');
Route::get('/brand/unpublished-brand/{id}', 'BrandController@unpublishedBrandInfo');
Route::get('/brand/edit-brand/{id}', 'BrandController@editBrandInfo');
Route::post('/brand/update-brand', 'BrandController@updateBrandInfo');
Route::get('/brand/delete-brand/{id}', 'BrandController@deleteBrandInfo');

/*Brand Info*/

/*Product Info*/

Route::get('/product/add-product', 'ProductController@addProductInfo');
Route::post('/product/new-product', 'ProductController@saveProductInfo');
Route::get('/product/manage-product', 'ProductController@manageProductInfo');
Route::get('/product/view-product/{id}', 'ProductController@viewProductInfo');
Route::get('/product/published-product/{id}', 'ProductController@publishedProductInfo');
Route::get('/product/unpublished-product/{id}', 'ProductController@unpublishedProductInfo');
Route::get('/product/edit-product/{id}', 'ProductController@editProductInfo');
Route::post('/product/update-product', 'ProductController@updateProductInfo');
Route::get('/product/delete-product/{id}', 'ProductController@deleteProductInfo');

/*Product Info*/
