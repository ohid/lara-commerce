<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::controller('auth', 'Auth\AuthController', [
	'getLogin' => 'auth.login',
	'getLogout' => 'auth.logout',
]);

// For home route
Route::get('/', 'FrontendController@index');

// For search route
Route::get('/search', ['as' => 'search', 'uses' => 'FrontendController@search']);

// For cart route
Route::get('/cart', 'FrontendController@getCart');

// Remove items from cart
Route::post('/cart/{rowID}', ['as' => 'removeCartItem', 'uses' => 'FrontendController@removeCartItem']);

// For Shop route
Route::get('/shop', 'FrontendController@shop');

// Add product to cart route
Route::post('/addToCart/{id}', ['as' => 'addToCart', 'uses' => 'FrontendController@addToCart']);

// Searching tags
Route::get('/tags/{tags}', ['as' => 'search.tag', 'uses' => 'FrontendController@searchTag']);

// Searching categories
Route::get('/categories/{categories}', ['as' => 'search.tag', 'uses' => 'FrontendController@searchCategories']);

Route::group(array('prefix' => 'admin'), function() {
	// Category route
	Route::resource('category', 'Admin\CategoryController');
	Route::get('category/{id}/confirm', ['as' => 'admin.category.confirm', 'uses' => 'Admin\CategoryController@confirm']);

	// Product route
	Route::resource('product', 'Admin\ProductController');
	Route::get('product/{id}/confirm', ['as' => 'admin.product.confirm', 'uses' => 'Admin\ProductController@confirm']);

	// Tag route
	Route::resource('tag', 'Admin\TagController');
	Route::get('tag/{id}/confirm', ['as' => 'admin.tag.confirm', 'uses' => 'Admin\TagController@confirm']);

	// Upload product photo
	Route::post('product/{id}/photos', 'Admin\ProductController@addPhoto');
	Route::delete('product/photo/delete/{id}', ['as' => 'admin.product.photo.delete', 'uses' => 'Admin\ProductController@deleteProductPhoto']);
});

// Redirect to other page
Route::get('admin', function() {
	return redirect(route('admin.product.index'));
});
Route::get('/{id}', 'FrontendController@show');
