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
            ->get();

        $data = [
            'title' => "Pesanan Online",
            'breadcrumb' => "Pesanan Online",
            'trans' => $trans
        ];

        return view('admin/psn_Online', $data);
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
