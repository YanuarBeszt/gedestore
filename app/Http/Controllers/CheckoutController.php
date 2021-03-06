<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Session;

class CheckoutController extends Controller
{
    public function index()
    {
        // get profil user
        $profil = DB::table('tb_users')
            ->select('*')
            ->where('idUser', Session::get('user_id'))
            ->get();

        foreach ($profil as $prf) {
            $prof['namaUser'] = $prf->namaUser;
            $prof['emailUser'] = $prf->emailUser;
            $prof['alamatUser'] = $prf->alamatUser;
            $prof['telponUser'] = $prf->telponUser;
            $prof['prov'] = $prf->prov;
            $prof['city'] = $prf->city;
            $prof['created_at'] = $prf->created_at;
        }
        // end get profil user

        // === generate kode transaksi ===
        $brgid = DB::table('tb_transaksi')->orderBy('transaksi_nomor', 'desc')->limit(1)->get();
        $check = $brgid->count();
        if ($check == 0) {
            $number = "TRX-000000000";
        } else {
            foreach ($brgid as $brgidd) {
                $number = $brgidd->transaksi_nomor;
            }
        }
        $lastnumb = (int) substr($number, 9, 9);
        $lastnumb++;
        $char = "TRX-";
        $lastkode = $char . sprintf("%09s", $lastnumb);
        // === end generate kode transaksi ===

        $brg = DB::table('tb_stok AS s')
            ->join('tb_barang AS b', 'b.barang_id', '=', 's.stok_barang_id')
            ->select('*')
            ->get();

        $cart = \Cart::getContent();
        $jml_crt = \Cart::getContent()->count();
        $total = \Cart::getSubTotal();

        $data = [
            'title' => "Transaksi",
            'breadcrumb' => "Transaksi Penjualan",
            'kode_trans' => $lastkode,
            'barang' => $brg,
            'cart' => $cart,
            'jml_crt' => $jml_crt,
            'jml_total' => $total,
        ];
        if ($jml_crt > 0) {
            return view('keranjang/checkout', $data, $prof);
        } else {

            return redirect()->back()->with('alert', 'Keranjang Kosong');
        }
    }

    public function proses_transaksi(Request $request)
    {

        $jml_crt = \Cart::getContent()->count();

        if ($jml_crt > 0) {
            //isi allert
            $messages = [
                'required' => 'Form :attribute wajib di isi *',

            ];

            //validasi form
            request()->validate([
                'kode_trans' => 'required',
                'alamat' => 'required',
                'name' => 'required',
                'kurir' => 'required',
                'service' => 'required'


            ], $messages);

            $brg = \Cart::getContent();
            $total = \Cart::getSubTotal();



            DB::table('tb_transaksi')->insert([
                'transaksi_nomor' => $request->kode_trans,
                'transaksi_member_id' => $request->user_id,
                'transaksi_tanggal' => date('Y-m-d'),
                'transaksi_alamat_pengiriman' => $request->alamat,
                'transaksi_jumlah_uang' => $total + $request->service,
                'ongkir' => $request->service,
                'transaksi_status_pesanan' => 'Belum',
                'transaksi_status' => 'online'
            ]);


            foreach ($brg as $key) {

                $detail = [
                    'dt_transaksi_nomor' => $request->kode_trans,
                    'dt_barang_id' => $key->attributes->kode_brg,
                    'dt_barang_ukuran' => $key->attributes->size,
                    'dt_jumlah_barang' => $key->quantity,
                    'dt_jumlah_harga' => $key->quantity * $key->price

                ];

                $update_stok = [
                    'stok_jumlah_stok' => $key->attributes->jml_stok_gudang - $key->quantity

                ];
                DB::table('tb_detail_transaksi')->insert($detail);
                DB::table('tb_stok')->where('stok_id', $key->attributes->stok_id)->update($update_stok);
            }


            \Cart::clear();

            return redirect('/invoice/' . $request->kode_trans . '')->with('success', 'Checkout');
        } else {
            return redirect()->back()->with('alert', 'Keranjang Kosong');
        }
    }
    public function invoice($id)
    {

        $inv = DB::table('tb_detail_transaksi AS td')
            ->join('tb_transaksi AS tr', 'tr.transaksi_nomor', '=', 'td.dt_transaksi_nomor')
            ->select('*')
            ->where('tr.transaksi_nomor', $id)
            ->where('tr.transaksi_member_id', session('user_id'))
            ->get();

        $data['brg_trans'] = DB::table('tb_detail_transaksi AS td')
            ->join('tb_barang AS b', 'b.barang_id', '=', 'td.dt_barang_id')
            ->where('td.dt_transaksi_nomor', $id)
            ->get();

        foreach ($inv as $i) {

            $data['kode'] = $i->transaksi_nomor;
            $data['tgl'] = $i->transaksi_tanggal;
            $data['alamat'] = $i->transaksi_alamat_pengiriman;
            $data['jml_total'] = $i->transaksi_jumlah_uang;
            $data['status'] = $i->transaksi_status_pesanan;
            $data['ongkir'] = $i->ongkir;
        }

        return view('content/invoice', $data);
    }
}
