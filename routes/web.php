<?php

Route::get('/', function () {
    return view('install');
});

Route::get('company', function () {
    return view('company');
});
Route::get('/api/get/captcha', 'ApiController@getCaptcha');

Route::get('/register/langlist', 'Auth\RegisterController@langlist');
Route::get('/register/countrylist', 'Auth\RegisterController@countrylist');

Auth::routes();
Route::get('/profile', 'ProfileController@index');

