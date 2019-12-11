<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use DateTime;

class ProfilController extends Controller
{
    public function index()
    {
        $profil = DB::table('tb_users')
            ->select('*')
            ->where('idUser', Session::get('user_id'))
            ->get();

        foreach ($profil as $prf) {
            $prof['namaUser'] = $prf->namaUser;
            $prof['emailUser'] = $prf->emailUser;
            $prof['alamatUser'] = $prf->alamatUser;
            $prof['telponUser'] = $prf->telponUser;
            $prof['prov'] = $prf->prov;
            $prof['city'] = $prf->city;
            $prof['created_at'] = $prf->created_at;
        }
        $data = [
            'title' => "Data Pribadi Anda",
            'breadcrumb' => "Halaman Profil",
            // 'province' => $this->province()

        ];

        return view('content/profil', $data, $prof);
    }

    public function updateProfil(Request $request)
    {
        $now = new DateTime();
        $password = $request->password;
        $password2 = $request->password2;

        $messages = [
            'required' => 'Form :attribute wajib di isi *',

        ];

        //validasi form
        request()->validate([
            'alamat' => 'required',
            'nama' => 'required',
            'prov' => 'required',
            'city' => 'required',
            'password' => 'required|min:5',

        ], $messages);

        if (strcmp($password, $password2) == 0) {
            DB::table('tb_users')
                ->where('idUser', Session::get('user_id'))
                ->update([
                    'namaUser' => $request->nama,
                    'emailUser' => $request->email,
                    'alamatUser' => $request->alamat,
                    'prov' => $request->prov,
                    'city' => $request->city,
                    'telponUser' => $request->telpon,
                    'password' => md5($request->password),
                    // 'created_at' => $request->created,
                    'updated_at' => $now
                ]);
            return redirect('/profil')->with('success', 'Data Pribadi Anda Berhasil Dirubah');
        } else {
            return redirect('/profil')->with('alert', 'Password Yang Anda Masukkan Tidak Cocok');
        }
    }

    public function lupa_pass(){
        return view('/cust-auth/lupa_pass');
    }
    public function reset_pass(){
        return view('/cust-auth/reset_pass');
    }
    public function proses_lupa_pass(Request $request)
    {
        $token = uniqid();

       $lupa =  DB::table('tb_users')
                ->where('emailUser', $request->email)
                ->where('telponUser', $request->telpon)
                ->first();


        if(!empty($lupa)){

                $id = $lupa->idUser;

            DB::table('tb_users')
            ->where('idUser', $id)
            ->update(['token' => $token]);

            return redirect('/reset-pass/'.$token.'');

        }else{
            return redirect('/lupa-pass/')->with('alert', 'Email / no telpon tidak di temukan');
        }
    }
    public function proses_reset(Request $request)
    {
        $messages = [
            'required' => 'Form :attribute wajib di isi *',
            'min' => ':attribute harus berisi minimal 6 karakter *',
            'same' => ':attribute harus sama dengan password, mohon cek kembali',

        ];

        $this->validate($request, [
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password'
        ], $messages);

        $data = [
            'password' => md5($request->password),
            'token' => ''
        ];
            DB::table('tb_users')
            ->where('token', $request->token)
            ->update($data);


            return redirect('/customer/login/')->with('success', ' ubah password');
        
    }



    public function province()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: b67d482e0374142b7cc65553fbcb7f81"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return json_decode($response);
        }
    }
    public function fetch_province()
    {
        $string = $this->province();

        $output = '';

        $output = '
                    <option data-display="Select" value="belum">--pilih provinsi--</option>

                                
             ';
        foreach ($string->rajaongkir->results as $i) {

            $output .= '
                                    <option value="' . $i->province_id . '">' . $i->province . '</option>

                                  ';
        }

        return $output;
    }
    public function fetch_city(Request $request)
    {
        $prov = $request->get('prov');
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=" . $prov . "",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: b67d482e0374142b7cc65553fbcb7f81"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $c = json_decode($response);
        }




        $output = '';

        $output = '
                    <option data-display="Select" value="">--pilih kota--</option>
 
         ';
        foreach ($c->rajaongkir->results as $i) {

            $output .= '
                                <option value="' . $i->city_id . '">' . $i->city_name . '</option>

                              ';
        }

        return $output;
    }
}
