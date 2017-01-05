<?php

Route::get('/', 'Controller@index');
Route::get('/api/get/captcha', 'ApiController@getCaptcha');


Route::get('install', function () {
    return view('install');
});

Route::get('company', function () {
    return view('company');
});