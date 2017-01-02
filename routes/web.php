<?php

Route::get('/', 'Controller@index');
Route::get('/api/get/captcha', 'ApiController@getCaptcha');