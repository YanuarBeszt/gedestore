<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransaksiKeluarController extends Controller
{
    public function index()
    {

        $data = [
            'title' => "Transaksi",
            'breadcrumb' => "Transaksi Penjualan"
        ];

        return view('admin/tr_barangKeluar', $data);
    }
}
