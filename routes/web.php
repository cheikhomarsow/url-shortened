<?php


Route::get('/', 'UrlController@create');

Route::post('/', 'UrlController@store');

Route::get('/{shortened}', 'UrlController@show');

