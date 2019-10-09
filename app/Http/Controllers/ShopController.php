<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function index()
    {

        $data['barang'] = DB::table('tb_barang')->get();

        return view('content/shop', $data);
    }

    public function showProduct($id)
    {
        $product = DB::table('tb_barang')->where('idBrg', $id)->get();

        foreach ($product as $p) {
            $data['namaBrg'] = $p->namaBrg;
            $data['hargaJual'] = $p->hargaJual;
            $data['deskripsi'] = $p->deskripsi;
            $data['gambarBrg'] = $p->gambarBrg;
        }
        return view('content/details', $data);
    }
}
