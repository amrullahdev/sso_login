<?php

use Illuminate\Support\Facades\Route;

Route::post('/sso-login', 'ssoLoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/', 'halamanController@homepage')->name('homepage');
Route::get('{path}', 'halamanController')->where('path', '(.*)');