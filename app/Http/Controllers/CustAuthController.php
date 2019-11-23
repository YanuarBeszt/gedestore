<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use DB; 
use App\Tb_users;
use Session;
use Illuminate\Support\Facades\Auth;

use DateTime;

class CustAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->session()->exists('login_user')) {
            //can't find any sessionn
            return redirect()->back()->with('alert','Silahkan Logout Terlebih Dahulu');
        }
        return view('cust-auth/login');
        
    }
    public function register_user(Request $request)
    {

        if($request->session()->exists('login_user')) {
            //can't find any sessionn
            return redirect()->back()->with('alert','Silahkan Logout Terlebih Dahulu');
        }
        return view('cust-auth/register');

    }
    public function proses_register(Request $request)
    {
        $now = new DateTime();
		$messages = [
			'required' => 'Form :attribute wajib di isi *',
			'email' => 'Tolong gunakan :attribute yang sah *',
			'max' => ':attribute max 100',
		];

		//validasi form

        $this->validate($request,[
			'email' => 'required|email|max:100',
            'password' => 'required',
			'nama' => 'required',

        ], $messages);
        DB::table('tb_users')->insert([
            'namaUser' => $request->nama,
            'emailUser' => $request->email,
            'password' => md5($request->password),
            'created_at' => $now,
        ]);

        return redirect('customer/login')->with('success', 'Daftar silahkan login');
        
    }

	// public function pass(){

	// 	$passw = md5('123123');
	// 	return print_r($passw);
	// }

	public function postLogin(Request $request)
	{
		//isi allert
		$messages = [
			'required' => 'Form : attribute wajib di isi *',
			'email' => 'Tolong gunakan : attribute yang sah *',
			'max' => ': attribute max 100',
		];

		//validasi form

        $this->validate($request,[
			'email' => 'required|email|max:100',
			'password' => 'required',
        ], $messages);

		//fungsi login
		$user = Tb_users::where('emailUser', $request->email)
			->where('password', md5($request->password))
			->first();

		if (!empty($user)) {
			//membuat session user logged in
			Session::put('user_nama', $user->namaUser);
			Session::put('user_email', $user->emailUser);
			Session::put('user_id', $user->idUser);
			Session::put('login_user', TRUE);
			return redirect('/');
		} else {
			//gagal login
			return redirect('customer/login')->with('alert', 'Password atau Email, Salah !');
		}
	}

	public function keluar()
	{

		Session::flush();
        return redirect()->back()->with('success','Logout');
	}
}
