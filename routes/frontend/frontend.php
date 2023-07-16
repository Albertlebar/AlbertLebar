<?php

Route::get('/', 'HomeController@index');
Route::get('/terms-conditions','HomeController@termsConditions');
Route::get('/return-policy','HomeController@returnPolicy');
Route::get('/about-us','HomeController@aboutUs');
Route::get('/book-appointment','HomeController@bookAppointment');
Route::get('/viewNews/{blog}', 'HomeController@viewNews');

Route::get('/item/{item_type}','ItemController@index');
Route::get('item/item-details/{item_id}','ItemController@itemDetails');
