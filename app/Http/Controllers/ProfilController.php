<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use DateTime;

class ProfilController extends Controller
{
    public function index()
    {
        $profil = DB::table('tb_users')
            ->select('*')
            ->where('idUser', Session::get('user_id'))
            ->get();

        $data = [
            'title' => "Data Pribadi Anda",
            'breadcrumb' => "Halaman Profil",
            'profil' => $profil
        ];

        return view('content/profil', $data);
    }

    public function updateProfil(Request $request)
    {
        $now = new DateTime();
        $password = $request->password;
        $password2 = $request->password2;

        if (strcmp($password, $password2) == 0) {
            DB::table('tb_users')
                ->where('idUser', Session::get('user_id'))
                ->update([
                    'namaUser' => $request->nama,
                    'emailUser' => $request->email,
                    'alamatUser' => $request->alamat,
                    'telponUser' => $request->telpon,
                    'password' => md5($request->password),
                    'created_at' => $request->created,
                    'updated_at' => $now
                ]);
            return redirect('/profil')->with('success', 'Data Pribadi Anda Berhasil Dirubah');
        } else {
            return redirect('/profil')->with('alert', 'Password Yang Anda Masukkan Tidak Cocok');
        }
    }
}
