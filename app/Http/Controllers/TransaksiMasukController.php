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
                            ->select('tb_barang.barang_id', 'tb_barang.barang_nama', 'tb_stok.stok_ukuran', 'tb_detail_transaksi_masuk.detiltrans_masuk_stok', 'tb_detail_transaksi_masuk.detiltrans_masuk_totalHarga', 'tb_stok.stok_id', 'tb_detail_transaksi_masuk.detiltrans_masuk_id', 'tb_stok.stok_jumlah_stok', 'tb_barang.barang_harga_beli')
                            ->where('tb_detail_transaksi_masuk.detiltrans_masuk_idtrans', $lastkode)
                            ->get(),
            'totalbayar' => DB::table('tb_detail_transaksi_masuk')->select(DB::raw('SUM(detiltrans_masuk_totalHarga) as total'))
                                ->where('detiltrans_masuk_idtrans', $lastkode)
                                ->first(),
            'lastid' => $lastkode
        ];
        
        return view ('admin/tr_barangMasuk', $data);
    }
    
    public function tambah_detail($id, $idtr) {
        $check =  DB::table('tb_detail_transaksi_masuk')
                        ->where('detiltrans_masuk_idtrans', $idtr)
                        ->where('detiltrans_masuk_idstok', $id)->get()->count();;
        
        if ($check == 0) {
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
        }
        return redirect('/admin/halaman-transaksi-barang-masuk');
    }
    
    public function update_detail(Request $update) {
        $iddetail = $update->iddetail;
        $newdetail = $update->updatedetail;
        
        $stok = DB::table('tb_detail_transaksi_masuk')
                    ->join('tb_stok', 'tb_stok.stok_id', '=', 'tb_detail_transaksi_masuk.detiltrans_masuk_idstok')
                    ->select('*')
                    ->where('tb_detail_transaksi_masuk.detiltrans_masuk_id', $iddetail)
                    ->first();
        
        if ($newdetail > $stok->detiltrans_masuk_stok) {
            $total = $newdetail - $stok->detiltrans_masuk_stok;
            $hasil = $stok->stok_jumlah_stok - $total;
            
            DB::table('tb_stok')->where('stok_id', $stok->detiltrans_masuk_idstok)->update([
                'stok_jumlah_stok' => $hasil
            ]);
        } else if ($newdetail < $stok->detiltrans_masuk_stok) {
            $total = $stok->detiltrans_masuk_stok - $newdetail;
            $hasil = $stok->stok_jumlah_stok + $total;
            
            DB::table('tb_stok')->where('stok_id', $stok->detiltrans_masuk_idstok)->update([
                'stok_jumlah_stok' => $hasil
            ]);
        }
        
        $getharga = DB::table('tb_barang')->where('barang_id', $stok->stok_barang_id)->first();
        
        $totalharga = $getharga->barang_harga_beli * $newdetail;
        
        DB::table('tb_detail_transaksi_masuk')->where('detiltrans_masuk_id', $iddetail)->update([
            'detiltrans_masuk_totalHarga' => $totalharga,
            'detiltrans_masuk_stok' => $newdetail
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
    
    public function transaksi_baru(Request $insert) {
        $check = DB::table('tb_detail_transaksi_masuk')->where('detiltrans_masuk_idtrans', $insert->transaksi)->get()->count();
        
        if ($insert->bayar == '') {
            return redirect('/admin/halaman-transaksi-barang-masuk');
        } else if ($insert->bayar >= $insert->total) {
            if($check != 0) {
                DB::table('tb_transaksi_masuk')->insert([
                    'trans_masuk_id' => $insert->transaksi,
                    'trans_masuk_tanggal' => date('Y-m-d'),
                    'trans_masuk_suplier' => 'uwu',
                    'trans_masuk_totalharga' => $insert->total
                ]);
            
                return redirect('/admin/halaman-transaksi-barang-masuk');
            } else {
                return redirect('/admin/halaman-transaksi-barang-masuk');
            }
        } else if ($insert->bayar < $insert->total) {
            return redirect('/admin/halaman-transaksi-barang-masuk');
        }
        
    }
    
}
