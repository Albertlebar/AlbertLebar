<?php

Route::get('/', 'HomeController@index');
Route::get('/viewNews/{blog}', 'HomeController@viewNews');

Route::get('/item/{item_type}','ItemController@index');
