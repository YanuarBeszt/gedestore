<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RajaController extends Controller
{
    public function index()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=501&destination=114&weight=1700&courier=jne",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: b67d482e0374142b7cc65553fbcb7f81"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }

    public function cost(Request $request)
    {
        $kota = $request->get('kota');
        $berat = $request->get('berat');

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=160&destination=" . $kota . "&weight=" . $berat . "&courier=jne",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
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
                    <option data-display="Select" value="">--pilih kota dulu--</option>
 
         ';
        if ($kota == 160) {
            $output = '
            <option  value="0">Jember Gratis</option>

 ';
        } else {
            if (!$kota == '') {
                foreach ($c->rajaongkir->results as $i) {
                    // print_r($i->costs[0]->cost[0]->etd); //get etd

                    // print_r($i->costs[0]->cost[0]->value); //get harga
                    // print_r($i->costs[0]->service);
                    // print_r($i->costs[1]->cost);

                    $output = '
                        <option  value="' . $i->costs[0]->cost[0]->value . '">' . $i->costs[0]->service . ' - Estimasi ' . $i->costs[0]->cost[0]->etd . ' Hari - Rp.' . $i->costs[0]->cost[0]->value . '</option>
                        <option  value="' . $i->costs[1]->cost[0]->value . '">' . $i->costs[1]->service . ' - Estimasi ' . $i->costs[1]->cost[0]->etd . ' Hari - Rp.' . $i->costs[1]->cost[0]->value . '</option>
    
             ';
                }
            }
        }


        return $output;
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
            echo $response;
        }
    }
    public function city()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=11",
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
            echo json_decode($response);
        }
    }

    //
}
