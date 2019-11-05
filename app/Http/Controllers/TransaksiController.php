<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{

    //
    public function transMasuk()
    {
        $barang = DB::table('tb_barang')->get();

        $data = [
            'title' => "Transaksi",
            'breadcrumb' => "Transaksi Tambah Barang",
            'barang' => $barang
        ];

        return view('admin/tr_barangMasuk', $data);
    }

    public function transKeluar()
    {

        $data = [
            'title' => "Transaksi",
            'breadcrumb' => "Transaksi Penjualan"
        ];

        return view('admin/tr_barangKeluar', $data);
    }
}
