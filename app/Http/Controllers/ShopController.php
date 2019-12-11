<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Helper\Table;
use Illuminate\Support\Facades\Session;

class ShopController extends Controller
{
    public function index()
    {
        $kategori = DB::table('tb_barang')
            ->select('*', DB::raw('count(barang_kategori_id) as kategoriTotal'))
            ->join('tb_kategori', 'tb_barang.barang_kategori_id', '=', 'tb_kategori.kategori_id')
            ->groupBy('barang_kategori_id')
            ->get();

        $barang = DB::table('tb_stok')
            ->select('*', DB::raw('SUM(stok_jumlah_stok) as total'))
            ->join('tb_barang', 'tb_barang.barang_id', '=', 'tb_stok.stok_barang_id')
            ->groupBy('barang_id')
            ->paginate(12);

        $data = [
            'barang' => $barang,
            'kategori' => $kategori
        ];

        return view('content/shop', $data);
    }

    public function shop($id)
    {
        $barang = DB::table('tb_stok')
            ->select('*', DB::raw('SUM(stok_jumlah_stok) as total'))
            ->join('tb_barang', 'tb_barang.barang_id', '=', 'tb_stok.stok_barang_id')
            ->where('barang_kategori_id', $id)
            ->groupBy('barang_id')
            ->paginate(12);

        $kategori = DB::table('tb_barang')
            ->select('*', DB::raw('count(barang_kategori_id) as kategoriTotal'))
            ->join('tb_kategori', 'tb_barang.barang_kategori_id', '=', 'tb_kategori.kategori_id')
            ->groupBy('barang_kategori_id')
            ->get();

        $data = [
            'barang' => $barang,
            'kategori' => $kategori
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

        $data['ukuran_stok'] = DB::table('tb_stok')->where('stok_barang_id', $id)->get();

        foreach ($barang as $p) {
            $data['stok_id'] = $p->stok_id;
            $data['stok_ukuran'] = $p->stok_ukuran;
            $data['barang_id'] = $p->barang_id;
            $data['barang_nama'] = $p->barang_nama;
            $data['price'] = $p->barang_harga_jual;
            $data['barang_deskripsi'] = $p->barang_deskripsi;
            $data['barang_gambar'] = $p->barang_gambar;
            $data['kategori_nama'] = $p->kategori_nama;
            $data['stok_gudang'] = $p->stok_jumlah_stok;
        }
        return view('content/details', $data);
    }
}
