<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class co_admTransaksi extends Controller
{
    //
    public function transMasuk() {
        
        $data = [
            'title' => "Transaksi",
            'breadcrumb' => "Transaksi Tambah Barang"
        ];
        
        return view ('admin/tr_barangMasuk', $data);
    }
    
    public function transKeluar() {
        
        $data = [
            'title' => "Transaksi",
            'breadcrumb' => "Transaksi Penjualan"
        ];
        
        return view ('admin/tr_barangKeluar', $data);
    }
}
