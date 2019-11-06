<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Tb_admin;

use Session;

class AuthController extends Controller
{
	public function index(Request $request)
	{
		if ($request->session()->exists('login')) {
			// user value cannot be found in session
			return redirect()->back()->with('alert', 'Silahkan logout Terlebih dahulu!');
		}
		return view('auth/login');
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
		request()->validate([
			'emailUser' => 'required|email|max:100',
			'password' => 'required',
		], $messages);

		//fungsi login
		$user = Tb_admin::where('admin_email', $request->emailUser)
			->where('password', md5($request->password))
			->first();

		if (!empty($user)) {
			//membuat session user logged in
			Session::put('admin_nama', $user->namaUser);
			Session::put('admin_email', $user->emailUser);
			Session::put('admin_id', $user->idUser);
			Session::put('login', TRUE);
			return redirect('admin/halaman-dashboard');
		} else {
			//gagal login
			return redirect('login')->with('alert', 'Password atau Email, Salah !');
		}
	}

	public function keluar()
	{

		Session::flush();
		Auth::keluar();
		return redirect('login');
	}
}
