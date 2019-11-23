<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    //
    public function lapMasuk() {
        
        $data = [
            'title' => "Laporan",
            'breadcrumb' => "Laporan Barang Masuk"
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
