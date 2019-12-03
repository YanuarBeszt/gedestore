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

        foreach ($profil as $prf) {
            $prof['namaUser'] = $prf->namaUser;
            $prof['emailUser'] = $prf->emailUser;
            $prof['alamatUser'] = $prf->alamatUser;
            $prof['telponUser'] = $prf->telponUser;
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
                "key: 1a94be35e19a5a900f1c36ab2e9b7813"
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
        public function fetch_province(){
            $string = $this->province();

             $output = '';

             $output = '
                 <select name="provinsi" id="provinsi">
                    <option value="">--pilih provinsi--</option>

                                
             ';
                         foreach ($string->rajaongkir->results as $i ) {

                            $output .= '
                                    <option value="'.$i->province_id.'">'.$i->province.'</option>

                                  ';

                         }

             $output .= '</select>';
             return $output;
        }
    public function fetch_city(Request $request){
        $prov = $request->get('prov');
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=".$prov."",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: 1a94be35e19a5a900f1c36ab2e9b7813"
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
             <select name="city" id="city">
                    <option value="">--pilih kota--</option>
 
         ';
                     foreach ($c->rajaongkir->results as $i ) {

                        $output .= '
                                <option value="'.$i->city_id.'">'.$i->city_name.'</option>

                              ';

                     }

         $output .= '</select>';
         return $output;
    }
}
