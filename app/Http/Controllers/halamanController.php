<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class halamanController extends Controller
{

    public function __invoke()
    {
    	return view('home');
    }

    public function homepage()
    {
        return view('layouts.app');
    }

}
