<?php
Route::get('/', function () {
    return view('install');
});

Route::get('company', function () {
    return view('company');
});

//API
Route::get('/api/get/captcha', 'ApiController@getCaptcha');
Route::post('/api/check/captcha', 'ApiController@checkCaptcha');

//Register
Route::get('/register/langlist', 'Auth\RegisterController@langlist');
Route::get('/register/countrylist', 'Auth\RegisterController@countrylist');

//Profile
Auth::routes();
Route::get('/profile', 'ProfileController@index');
Route::get('/profile/captcha', 'ProfileController@captcha');
Route::post('/profile/create', 'ProfileController@create');
Route::post('/profile/save', 'ProfileController@save');
