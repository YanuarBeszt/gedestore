<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiMasukController extends Controller
{
    public function index() {
        $brgid = DB::table('tb_transaksi_masuk')->orderBy('trans_masuk_id', 'desc')->limit(1)->get();        
        $check = $brgid->count();
        if($check == 0){
            $number = "TRX-000000000";
        } else {
            foreach($brgid as $brgidd) {
               $number = $brgidd->trans_masuk_id;
            }
        }
        $lastnumb = (int) substr($number, 9, 9);
        $lastnumb++;
        $char = "TRX-";
        $lastkode = $char.sprintf("%09s", $lastnumb);
        
        $data = [
            'title' => "Dashboard Barang Masuk",
            'breadcrumb' => "Barang Masuk",
            'dfstok' => DB::table('tb_stok')->join('tb_barang', 'tb_barang.barang_id', '=', 'tb_stok.stok_barang_id')->select('*')->get(),
            'dtstok' => DB::table('tb_detail_transaksi_masuk')
                            ->join('tb_stok', 'tb_stok.stok_id', '=', 'tb_detail_transaksi_masuk.detiltrans_masuk_idstok')
                            ->join('tb_barang', 'tb_barang.barang_id', '=', 'tb_stok.stok_barang_id')
                            ->select('tb_barang.barang_id', 'tb_barang.barang_nama', 'tb_stok.stok_ukuran', 'tb_detail_transaksi_masuk.detiltrans_masuk_stok', 'tb_detail_transaksi_masuk.detiltrans_masuk_totalHarga', 'tb_stok.stok_id', 'tb_detail_transaksi_masuk.detiltrans_masuk_id')
                            ->where('tb_detail_transaksi_masuk.detiltrans_masuk_idtrans', $lastkode)
                            ->get(),
            'lastid' => $lastkode
        ];
        
        return view ('admin/tr_barangMasuk', $data);
    }
    
    public function tambah_detail($id, $idtr) {
        $stok = DB::table('tb_stok')
                        ->join('tb_barang', 'tb_barang.barang_id', '=', 'tb_stok.stok_barang_id')
                        ->select('tb_barang.barang_harga_beli', 'tb_stok.stok_jumlah_stok')
                        ->where('tb_stok.stok_id', $id)
                        ->first();
        $total = $stok->stok_jumlah_stok - 1;
        DB::table('tb_stok')->where('tb_stok.stok_id', $id)->update(['stok_jumlah_stok' => $total]);
        
        DB::table('tb_detail_transaksi_masuk')->insert([
            'detiltrans_masuk_idtrans' => $idtr,
            'detiltrans_masuk_idstok' => $id,
            'detiltrans_masuk_stok' => '1',
            'detiltrans_masuk_totalHarga' => $stok->barang_harga_beli
        ]);
        
        return redirect('/admin/halaman-transaksi-barang-masuk');
    }
    
    public function delete_detail($id) {
        $returnstok = DB::table('tb_detail_transaksi_masuk')
                        ->select('detiltrans_masuk_idstok', 'detiltrans_masuk_stok')
                        ->where('detiltrans_masuk_id', $id)
                        ->first();
        
        $stok = DB::table('tb_stok')->where('stok_id', $returnstok->detiltrans_masuk_idstok)->select('*')->first();
        $total = $returnstok->detiltrans_masuk_stok + $stok->stok_jumlah_stok;
        DB::table('tb_stok')->where('stok_id', $returnstok->detiltrans_masuk_idstok)
            ->update([
                'stok_jumlah_stok' => $total
            ]);
        
        DB::table('tb_detail_transaksi_masuk')->where('detiltrans_masuk_id', $id)->delete();
        return redirect('/admin/halaman-transaksi-barang-masuk');
    }
}
