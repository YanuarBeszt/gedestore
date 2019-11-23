<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;

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

    public function proses_trans_masuk(Request $request)
    {
        $now = new DateTime();

        $messages = [
            'required' => 'Form :attribute wajib di isi *',
            'min' => ':attribute harus berisi minimal 5 karakter *',

        ];

        $this->validate($request,[
            'ukuran' => 'required',
            'ktgBrg' => 'required',
            'stok' => 'required'
        ], $messages);

        
        $cek = DB::table('tb_stok')->where('stok_barang_id', $request->ktgBrg)
            ->where('stok_ukuran', $request->ukuran)
            ->first();
        if (!empty($cek)) {
            return redirect('/admin/halaman-transaksi-barang-masuk')->with('alert', 'Ukuran Sudah Ada');

        } else {
            DB::table('tb_stok')->insert([
                'stok_barang_id' =>  $request->ktgBrg,
                'stok_ukuran' => $request->ukuran,
                'stok_jumlah_stok' => $request->stok
            ]);
                

                return redirect('/admin/halaman-transaksi-barang-masuk')->with('success', 'Transaksi Barang Masuk ');
        }




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
