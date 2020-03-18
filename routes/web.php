<?php


Route::get('/', 'HomeController@index');
Route::get('/search','HomeController@search');
Route::get('/detail/{movie_id}','HomeController@detail');
