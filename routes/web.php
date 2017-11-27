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
Route::post('/new-shipping','CheckoutController@saveShippingInfo');
Route::get('/payment-info','CheckoutController@showPaymentForm');
Route::post('/new-order','CheckoutController@saveOrderInfo');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

/*Category Info*/

Route::get('/category/add-category', 'CategoryController@addCategoryInfo')->middleware('AuthenticateMiddleware');
Route::post('/category/new-category', 'CategoryController@saveCategoryInfo')->middleware('AuthenticateMiddleware');
Route::get('/category/manage-category', 'CategoryController@manageCategoryInfo')->middleware('AuthenticateMiddleware');
Route::get('/category/published-category/{id}', 'CategoryController@publishedCategoryInfo')->middleware('AuthenticateMiddleware');
Route::get('/category/unpublished-category/{id}', 'CategoryController@unpublishedCategoryInfo')->middleware('AuthenticateMiddleware');
Route::get('/category/edit-category/{id}', 'CategoryController@editCategoryInfo')->middleware('AuthenticateMiddleware');
Route::post('/category/update-category', 'CategoryController@updateCategoryInfo')->middleware('AuthenticateMiddleware');
Route::get('/category/delete-category/{id}', 'CategoryController@deleteCategoryInfo')->middleware('AuthenticateMiddleware');

/*Category Info*/

/*Brand Info*/

Route::get('/brand/add-brand', 'BrandController@addBrandInfo')->middleware('AuthenticateMiddleware');
Route::post('/brand/new-brand', 'BrandController@saveBrandInfo')->middleware('AuthenticateMiddleware');
Route::get('/brand/manage-brand', 'BrandController@manageBrandInfo')->middleware('AuthenticateMiddleware');
Route::get('/brand/published-brand/{id}', 'BrandController@publishedBrandInfo')->middleware('AuthenticateMiddleware');
Route::get('/brand/unpublished-brand/{id}', 'BrandController@unpublishedBrandInfo')->middleware('AuthenticateMiddleware');
Route::get('/brand/edit-brand/{id}', 'BrandController@editBrandInfo')->middleware('AuthenticateMiddleware');
Route::post('/brand/update-brand', 'BrandController@updateBrandInfo')->middleware('AuthenticateMiddleware');
Route::get('/brand/delete-brand/{id}', 'BrandController@deleteBrandInfo')->middleware('AuthenticateMiddleware');

/*Brand Info*/

/*Product Info*/

Route::get('/product/add-product', 'ProductController@addProductInfo')->middleware('AuthenticateMiddleware');
Route::post('/product/new-product', 'ProductController@saveProductInfo')->middleware('AuthenticateMiddleware');
Route::get('/product/manage-product', 'ProductController@manageProductInfo')->middleware('AuthenticateMiddleware');
Route::get('/product/view-product/{id}', 'ProductController@viewProductInfo')->middleware('AuthenticateMiddleware');
Route::get('/product/published-product/{id}', 'ProductController@publishedProductInfo')->middleware('AuthenticateMiddleware');
Route::get('/product/unpublished-product/{id}', 'ProductController@unpublishedProductInfo')->middleware('AuthenticateMiddleware');
Route::get('/product/edit-product/{id}', 'ProductController@editProductInfo')->middleware('AuthenticateMiddleware');
Route::post('/product/update-product', 'ProductController@updateProductInfo')->middleware('AuthenticateMiddleware');
Route::get('/product/delete-product/{id}', 'ProductController@deleteProductInfo')->middleware('AuthenticateMiddleware');

/*Product Info*/

/*Order Info*/

Route::get('/manage-order', 'OrderController@manageOrderInfo')->middleware('AuthenticateMiddleware');
Route::get('/order/view-order-details/{id}', 'OrderController@viewOrderInfo')->middleware('AuthenticateMiddleware');
Route::get('/order/view-order-invoice/{id}', 'OrderController@viewOrderInvoice')->middleware('AuthenticateMiddleware');
Route::get('/pdf/{id}', 'OrderController@invoicePdf')->middleware('AuthenticateMiddleware');
Route::get('/order/edit-order/{id}', 'OrderController@editOrderInfo')->middleware('AuthenticateMiddleware');
Route::post('/order/update-order', 'OrderController@updateOrderInfo')->middleware('AuthenticateMiddleware');
Route::get('/order/delete-order/{id}', 'OrderController@viewOrderInvoice')->middleware('AuthenticateMiddleware');

/*Order Info*/
