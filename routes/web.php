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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'EcommerceController@index')->name('/');

Route::get('/category-product/{id}', 'EcommerceController@categoryProduct')->name('category-product');

Route::get('/product-details/{id}/{name}', 'EcommerceController@productDetails')->name('product-details');

Route::get('/brand-product/{id}', 'EcommerceController@brandProduct')->name('brand-product');

Route::get('/contact-us','EcommerceController@contactUs')->name('contact-us');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

//cart
Route::post('/cart/add', 'CartController@addToCart')->name('add-to-cart');
Route::get('/cart/show', 'CartController@showCart')->name('show-cart');
Route::get('/cart/delete/{id}', 'CartController@deleteCart')->name('delete-cart-item');
Route::post('/cart/update/', 'CartController@updateCart')->name('update-cart');

//checkout
Route::get('/checkout', 'CheckoutController@index')->name('checkout');

//admin
Route::get('/home', 'HomeController@index')->name('home');

//admin category
Route::get('/category/add','CategoryController@addCategory')->name('add-category');
Route::post('/category/new','CategoryController@newCategory')->name('new-category');
Route::get('/category/manage','CategoryController@manageCategory')->name('manage-category');
Route::get('/category/unpublished-category/{id}','CategoryController@unpublishedCategory')->name('unpublished-category');
Route::get('/category/published-category/{id}','CategoryController@publishedCategory')->name('published-category');
Route::get('/category/edit/{id}','CategoryController@editCategory')->name('edit-category');
Route::post('/category/update','CategoryController@updateCategory')->name('update-category');
Route::post('/category/delete','CategoryController@deleteCategory')->name('delete-category');

//admin brand
Route::get('/brand/add-brand','BrandController@addBrand')->name('add-brand');
Route::post('/brand/new-brand','BrandController@newBrand')->name('new-brand');
Route::get('/brand/manage-brand','BrandController@manageBrand')->name('manage-brand');
Route::get('/brand/edit-brand/{id}','BrandController@editBrand')->name('edit-brand');
Route::post('/brand/update-brand','BrandController@updateBrand')->name('update-brand');
Route::post('/brand/delete-brand','BrandController@deleteBrand')->name('delete-brand');
Route::get('/brand/unpublished-brand/{id}','BrandController@unpublishedBrand')->name('unpublished-brand');
Route::get('/brand/published-brand/{id}','BrandController@publishedBrand')->name('published-brand');

//admin product
Route::get('/product/add-product','ProductController@addProduct')->name('add-product');
Route::post('/product/new-product','ProductController@newProduct')->name('new-product');
Route::get('/product/manage-product','ProductController@manageProduct')->name('manage-product');
Route::get('/product/edit-product/{id}','ProductController@editProduct')->name('edit-product');
Route::post('/product/update-product','ProductController@updateProduct')->name('update-product');
Route::post('/product/delete-product','ProductController@deleteProduct')->name('delete-product');
Route::get('/product/unpublished-product/{id}','ProductController@unpublishedProduct')->name('unpublished-product');
Route::get('/product/published-product/{id}','ProductController@publishedProduct')->name('published-product');
