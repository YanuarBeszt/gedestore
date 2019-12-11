<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HistoryController extends Controller
{
    //
    public function index()
    {
        $data['trans'] = DB::table('tb_detail_transaksi')
            ->select('*', DB::raw('SUM(dt_jumlah_barang) as total'))
            ->join('tb_barang', 'tb_barang.barang_id', '=', 'tb_detail_transaksi.dt_barang_id')
            ->join('tb_transaksi', 'tb_transaksi.transaksi_nomor', '=', 'tb_detail_transaksi.dt_transaksi_nomor')
            ->where('transaksi_member_id', Session::get('user_id'))
            ->groupBy('dt_transaksi_nomor')
            ->get();



        return view('content/history', $data);
    }
}
