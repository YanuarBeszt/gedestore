<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventoryController extends Controller
{
    //
    public function index()
    {
        $barang = DB::table('tb_stok')
            ->select('*', DB::raw('SUM(stok_jumlah_stok) as total'))
            ->join('tb_barang', 'tb_barang.barang_id', '=', 'tb_stok.stok_barang_id')
            ->groupBy('barang_id')
            ->get();

        $data = [
            'title' => "Inventory",
            'breadcrumb' => "Inventory",
            'barang' => $barang
        ];

        return view('admin/inv_dashboard', $data);
    }

    public function addBarang()
    {
        $kategori = DB::table('tb_kategori')->get();

        $data = [
            'title' => "Inventory",
            'breadcrumb' => "Inventory - Tambah Barang",
            'kategori' => $kategori
        ];

        return view('admin/tambah_barang', $data);
    }

    public function storeBarang(Request $request)
    {
        $this->validate($request, [
            'namaBrg' => 'required|string'
        ]);

        DB::table('tb_barang')->insert([
            'barang_id' => uniqid(),
            'barang_nama' => $request->namaBrg,
            'barang_kategori_id' => $request->ktgBrg,
            'barang_harga_beli' => $request->hargaBeli,
            'barang_harga_jual' => $request->hargaJual,
            'barang_deskripsi' => $request->deskripsi,
            'barang_gambar' => $request->gambar
        ]);

        return redirect('/admin/halaman-tambah-barang')->with('success', 'Tambah Barang');
    }

    public function addKategori()
    {
        $data = [
            'title' => "Inventory",
            'breadcrumb' => "Inventory - Tambah Barang - Tambah Kategori"
        ];

        return view('admin/tambah_kategori', $data);
    }

    public function storeKategori(Request $request)
    {
        $this->validate($request, [
            'namaKtg' => 'required|string'
        ]);

        DB::table('tb_kategori')->insert([
            'kategori_nama' => $request->namaKtg
        ]);

        return redirect('/admin/halaman-tambah-barang')->with('success', 'Tambah Kategori');
    }
}
