<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class LaporanController extends Controller
{
    //
    public function lapMasuk()
    {
        $lap_masuk = DB::table('tb_detail_transaksi_masuk')
            ->select('*', DB::raw('SUM(detiltrans_masuk_totalHarga) as total'))
            ->join('tb_stok', 'tb_stok.stok_id', '=', 'tb_detail_transaksi_masuk.detiltrans_masuk_idstok')
            ->join('tb_transaksi_masuk', 'tb_detail_transaksi_masuk.detiltrans_masuk_idtrans', '=', 'tb_transaksi_masuk.trans_masuk_id')
            ->groupBy('detiltrans_masuk_idtrans')
            ->get();

        $data = [
            'title' => "Laporan",
            'breadcrumb' => "Laporan Transaksi Masuk",
            'laporan_masuk' => $lap_masuk
        ];

        return view('admin/lap_barangMasuk', $data);
    }

    public function cetak_pdf()
    {
        $lap_masuk = DB::table('tb_detail_transaksi_masuk')
            ->select('*', DB::raw('SUM(detiltrans_masuk_totalHarga) as total'))
            ->join('tb_stok', 'tb_stok.stok_id', '=', 'tb_detail_transaksi_masuk.detiltrans_masuk_idstok')
            ->join('tb_transaksi_masuk', 'tb_detail_transaksi_masuk.detiltrans_masuk_idtrans', '=', 'tb_transaksi_masuk.trans_masuk_id')
            ->groupBy('detiltrans_masuk_idtrans')
            ->get();

        $pdf = PDF::loadview('admin/lap_barangMasuk_pdf', ['lap_masuk' => $lap_masuk]);
        return $pdf->stream();
    }

    public function cetak_pdff()
    {
        $lap_masuk = DB::table('tb_detail_transaksi')
            ->select('*', DB::raw('SUM(dt_jumlah_barang) as totalbrg'), DB::raw('SUM(dt_jumlah_harga) as total'))
            ->join('tb_barang', 'tb_barang.barang_id', '=', 'tb_detail_transaksi.dt_barang_id')
            ->join('tb_transaksi', 'tb_detail_transaksi.dt_transaksi_nomor', '=', 'tb_transaksi.transaksi_nomor')
            ->groupBy('transaksi_nomor')
            ->get();

        $pdf = PDF::loadview('admin/lap_barangKeluar_pdf', ['lap' => $lap_masuk]);
        return $pdf->stream();
    }

    public function lapKeluar()
    {

        $lap_keluar = DB::table('tb_transaksi')
            ->select('*', DB::raw('SUM(transaksi_jumlah_uang) as total'), DB::raw('SUM(dt_jumlah_barang) as total_sales'))
            ->join('tb_detail_transaksi', 'tb_transaksi.transaksi_nomor', '=', 'tb_detail_transaksi.dt_transaksi_nomor')
            ->groupBy('transaksi_nomor')
            ->get();

        $data = [
            'title' => "Laporan",
            'breadcrumb' => "Laporan Penjualan",
            'laporan_keluar' => $lap_keluar
        ];

        return view('admin/lap_barangKeluar', $data);
    }
}
