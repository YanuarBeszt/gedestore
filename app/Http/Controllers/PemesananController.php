<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PemesananController extends Controller
{
    //
    public function pesanOnline()
    {
        $trans = DB::table('tb_transaksi')
            ->select('*')
            ->join('tb_users', 'tb_users.idUser', '=', 'tb_transaksi.transaksi_member_id')
            ->where('transaksi_status', 'online')
            ->where('transaksi_status_pesanan', 'Belum')
            ->get();

        $data = [
            'title' => "Pesanan Online",
            'breadcrumb' => "Pesanan Online",
            'trans' => $trans
        ];

        return view('admin/psn_Online', $data);
    }

    public function updatePesanan($id)
    {
        DB::table('tb_transaksi')
            ->where('transaksi_nomor', $id)
            ->update([
                'transaksi_status_pesanan' => "Sudah"
            ]);
        return redirect('/admin/halaman-pemesanan-online')->with('success', 'Data berhasil diupdate');
    }

    public function pesanOffline()
    {

        $data = [
            'title' => "Pesanan Offline",
            'breadcrumb' => "Pesanan Offline"
        ];

        return view('admin/psn_Offline', $data);
    }
}
