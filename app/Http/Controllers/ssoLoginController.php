<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\User;



class ssoLoginController extends Controller
{
    public function login(Request $request)
    {

        // $cekLogin=\Http::withToken($this->SSO_LOKAL)->post('127.0.0.1:8080/api/sso-login',[
		$cekLogin=\Http::withToken($this->SSO_LOGIN)->post('http://amr-sispen.herokuapp.com/api/sso-login',[
					'Content-Type'=>'application/json',
					'request'=>$request->all()]);
		$password=$request->password;

        if ($cekLogin == '422') {
        	abort(422,'username Tidak Ditemukan');
        }else{
        	if (User::where('username',$cekLogin['username'])->first()) {
        		return $this->autentikasi($cekLogin['username'],$password,$request);
        	}else{
        		return $this->register($cekLogin,$password,$request);
        	}
        }
    }

    public function register($dataLogin,$password,$request)
    {
	    $data=$dataLogin;
    	$user=new User;
		$user->kd_user=$dataLogin['kd_user']; 
		$user->nama=$dataLogin['nama']; 
		$user->akses=$dataLogin['akses']; 
		$user->username=$dataLogin['username']; 
		$user->password=Hash::make($password);
    	$user->save();

    	return $this->autentikasi($dataLogin['username'],$password,$request);
    }
    public function autentikasi($username,$password,$request)
    {
        if (Auth::attempt(['username' => $username, 'password' => $password])) {
            $request->session()->regenerate();
        }
    }
}
