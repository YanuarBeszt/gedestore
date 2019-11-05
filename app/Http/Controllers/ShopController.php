<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function index()
    {
        $barang = DB::table('tb_stok')
            ->select('*', DB::raw('SUM(stok_jumlah_stok) as total'))
            ->join('tb_barang', 'tb_barang.barang_id', '=', 'tb_stok.stok_barang_id')
            ->groupBy('barang_id')
            ->get();

        $data = [
            'barang' => $barang
        ];

        return view('content/shop', $data);
    }

    public function showProduct($id)
    {
        $barang = DB::table('tb_stok')
            ->select('*', DB::raw('SUM(stok_jumlah_stok) as total'))
            ->join('tb_barang', 'tb_barang.barang_id', '=', 'tb_stok.stok_barang_id')
            ->join('tb_kategori', 'tb_barang.barang_kategori_id', '=', 'tb_kategori.kategori_id')
            ->where('barang_id', $id)
            ->get();


        foreach ($barang as $p) {
            $data['barang_nama'] = $p->barang_nama;
            $data['barang_harga_jual'] = $p->barang_harga_jual;
            $data['barang_deskripsi'] = $p->barang_deskripsi;
            $data['barang_gambar'] = $p->barang_gambar;
            $data['kategori_nama'] = $p->kategori_nama;
        }
        return view('content/details', $data);
    }
}
