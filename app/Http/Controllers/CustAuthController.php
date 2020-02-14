<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Tb_users;
use Illuminate\Support\Facades\Session;
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
		if ($request->session()->exists('login_user')) {
			//can't find any sessionn
			return redirect()->back()->with('alert', 'Silahkan Logout Terlebih Dahulu');
		}
		return view('cust-auth/login');
	}
	public function register_user(Request $request)
	{
		//for register if still login, need to logout
		if ($request->session()->exists('login_user')) {
			//can't find any sessionn
			return redirect()->back()->with('alert', 'Silahkan Logout Terlebih Dahulu');
		}
		return view('cust-auth/register');
	}
	public function proses_register(Request $request)
	{
		//valdation messages
		$now = new DateTime();
		$messages = [
			'required' => 'Form :attribute wajib di isi *',
			'email' => 'Tolong gunakan :attribute yang sah *',
			'nohp' => 'Tolong gunakan :attribute yang sah *',
			'max' => ':attribute max 100',
		];

		//validasi form
		$this->validate($request, [
			'email' => 'required|email|max:100',
			'nohp' => 'required|max:12',
			'password' => 'required',
			'nama' => 'required',

		], $messages);

		$password = $request->password;
		$password2 = $request->password2;

		if (strcmp($password, $password2) == 0) {
			//input to db
			DB::table('tb_users')->insert([
				'namaUser' => $request->nama,
				'emailUser' => $request->email,
				'telponUser' => $request->nohp,
				'alamatUser' => "",
				'prov' => "0",
				'city' => "0",
				'password' => md5($request->password),
				'created_at' => $now,
			]);
		} else {
			return redirect('customer/register_user')->with('alert', 'Password yang dimasukkan tidak sama');
		}

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

		$this->validate($request, [
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
			Session::put('user_alamat', $user->alamatUser);
			Session::put('user_id', $user->idUser);
			Session::put('login_user', TRUE);
			return redirect('/shop');
		} else {
			//gagal login
			return redirect('customer/login')->with('alert', 'Password atau Email, Salah !');
		}
	}

	public function keluar()
	{

		Session::flush();
		return redirect('/shop')->with('success', 'Logout');
	}
}
