<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class autentikasiController extends Controller
{
    public function load_akun()
    {
        $varAkun=auth('api')->user();
        return compact('varAkun');
    }
}
