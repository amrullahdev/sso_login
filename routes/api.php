<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->group(function(){
	Route::get('load-akun','API\autentikasiController@load_akun');

});
