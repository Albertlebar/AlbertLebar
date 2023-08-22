<?php

Route::get('/', 'HomeController@index');
Route::get('/terms-conditions','HomeController@termsConditions');
Route::get('/return-policy','HomeController@returnPolicy');
Route::get('/about-us','HomeController@aboutUs');
Route::get('/book-appointment','HomeController@bookAppointment');
Route::get('/viewNews/{blog}', 'HomeController@viewNews');

Route::get('/item/{item_type}','ItemController@index');
Route::get('item/item-details/{item_id}','ItemController@itemDetails');
Route::get('/item/size/guide/{item_type}','ItemController@sizeGuide');


Route::post('item/add-to-cart', 'ItemController@addToCart');
Route::get('item-remove-cart/{item_id}', 'ItemController@removeToCart');
Route::get('cart','CheckoutController@cart');

Route::middleware('auth')->group(function ()
{
	Route::get('checkout','CheckoutController@checkout');
	Route::get('my-account','CheckoutController@myAccount');
	Route::post('save-user-details', 'CheckoutController@saveUserDetails');
	Route::post('checkout/shipping','CheckoutController@saveShipping');
	Route::post('stripe', 'CheckoutController@stripePost')->name('stripe.post');
	Route::get('checkout/payment/{order_id}', 'CheckoutController@payment')->name('checkout.payment');
	Route::post('item/favorite','ItemController@favorite');
	Route::post('item/unfavorite','ItemController@unfavorite');
});