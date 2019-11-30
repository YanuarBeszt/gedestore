<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    //
    public function lapMasuk() {
        

        $lap_masuk = DB::table('tb_detail_transaksi_masuk')
            ->join('tb_stok', 'tb_stok.stok_id', '=', 'tb_detail_transaksi_masuk.detiltrans_masuk_idstok')
            ->join('tb_transaksi_masuk', 'tb_detail_transaksi_masuk.detiltrans_masuk_idtrans', '=', 'tb_transaksi_masuk.trans_masuk_id')
            ->groupBy('trans_masuk_id')
            ->get();

        $data = [
            'title' => "Laporan",
            'breadcrumb' => "Laporan Barang Masuk",
            'laporan_masuk' => $lap_masuk
        ];
        
        return view ('admin/lap_barangMasuk', $data);
    }
    
    public function lapKeluar() {
        
        $data = [
            'title' => "Laporan",
            'breadcrumb' => "Laporan Penjualan"
        ];
        
        return view ('admin/lap_barangKeluar', $data);
    }
}
