<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiKeluarController extends Controller
{
    public function index()
    {
        // === generate kode transaksi ===
        $brgid = DB::table('tb_transaksi')->orderBy('transaksi_nomor', 'desc')->limit(1)->get();        
        $check = $brgid->count();
        if($check == 0){
            $number = "TRX-000000000";
        } else {
            foreach($brgid as $brgidd) {
               $number = $brgidd->transaksi_nomor;
            }
        }
        $lastnumb = (int) substr($number, 9, 9);
        $lastnumb++;
        $char = "TRX-";
        $lastkode = $char.sprintf("%09s", $lastnumb);
        // === end generate kode transaksi ===

        $brg = DB::table('tb_stok AS s')
        ->join('tb_barang AS b', 'b.barang_id', '=', 's.stok_barang_id')
        ->select('*')
        ->get();

        $data = [
            'title' => "Transaksi",
            'breadcrumb' => "Transaksi Penjualan",
            'kode_trans' => $lastkode,
            'barang' => $brg,
        ];

        return view('admin/tr_barangKeluar', $data);
    }
    public function add_cart(Request $request){
        return $request;
    }
}
