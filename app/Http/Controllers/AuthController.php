<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Tb_users;

use Session;

class AuthController extends Controller
{
    public function index(Request $request){

    	return view('/auth/login');

    }

    // public function pass(){

    // 	$passw = md5('123123');
    // 	return print_r($passw);
    // }

    public function postLogin(Request $request){
        $user = Tb_users::where('emailUser', $request->emailUser)
            ->where('password', md5($request->password))
            ->first();
    	if(!empty($user)){
    		// // session sukses
    		// foreach ($user as $key) {
    		// 	$nama = $key->namaUser;
    		// }
    		Session::put('namaUser', $user->namaUser);
    		Session::put('emailUser', $user->emailUser);
    		Session::put('login', TRUE);
    		// print_r($user->emailUser);
    		return redirect('admin/halaman-dashboard');
    	}else{
    		// gagal
    		// return redirect('/admin/login')->with('alert', 'Password atau email salah!');
    		echo '0';


    	}

    }

    public function keluar(){

    	Session::flush();
    	Auth::keluar();
    	return redirect('login');
    }
}
