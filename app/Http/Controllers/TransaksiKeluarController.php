<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Darryldecode\Cart\Facades\CartFacade;
use Darryldecode\Cart\Cart;
use Illuminate\Support\ServiceProvider;

class TransaksiKeluarController extends Controller
{
    public function index()
    {
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

        return view('admin/tr_barangKeluar', $data);
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
            ], $messages);

            $brg = \Cart::getContent();
            $total = \Cart::getSubTotal();



            DB::table('tb_transaksi')->insert([
                'transaksi_nomor' => $request->kode_trans,
                'transaksi_member_id' => 0,
                'transaksi_tanggal' => date('Y-m-d'),
                'transaksi_alamat_pengiriman' => '-',
                'transaksi_jumlah_uang' => $total,
                'transaksi_status_pesanan' => '-',
                'transaksi_status' => 'offline'
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

            return redirect('/admin/halaman-transaksi-penjualan-barang')->with('success', 'Transaksi');
        } else {
            return redirect('/admin/halaman-transaksi-penjualan-barang')->with('alert', ',Pilih Barang Dulu !');
        }
    }
    public function add_cart($id)
    {



        $jml_crt = \Cart::getContent()->count();

        $brg = \Cart::getContent();

        $get_brg = DB::table('tb_stok AS s')
            ->join('tb_barang AS b', 'b.barang_id', '=', 's.stok_barang_id')
            ->select('*')
            ->where('stok_id', $id)
            ->get();
        foreach ($get_brg as $g) {
            $id_stok = $g->stok_id;
            $id_brg = $g->stok_barang_id;
            $stok_ukuran = $g->stok_ukuran;
            $stok_jumlah_stok = $g->stok_jumlah_stok;
            $barang_nama = $g->barang_nama;
            $barang_harga_jual = $g->barang_harga_jual;
        }


        if ($jml_crt > 0) {

            foreach ($brg as $key) {


                if ($key->attributes->size == $stok_ukuran && $key->attributes->kode_brg == $id_brg) {

                    \Cart::update($key->id, array(
                        'quantity' => 1,
                    ));
                    break;
                } else {
                    \Cart::add(array(
                        'id' => uniqid(),
                        'name' => $barang_nama,
                        'price' => $barang_harga_jual,
                        'quantity' => 1,
                        'attributes' => array(
                            'kode_brg' => $id_brg,
                            'size' => $stok_ukuran,
                            'stok_id' => $id_stok,
                            'jml_stok_gudang' => $stok_jumlah_stok

                        )
                    ));
                    break;
                }
            }
        } else {
            \Cart::add(array(
                'id' => uniqid(),
                'name' => $barang_nama,
                'price' => $barang_harga_jual,
                'quantity' => 1,
                'attributes' => array(
                    'kode_brg' => $id_brg,
                    'size' => $stok_ukuran,
                    'stok_id' => $id_stok,
                    'jml_stok_gudang' => $stok_jumlah_stok

                )
            ));
        }





        // $items = \Cart::getContent();
        // return $get_brg;
        return redirect('/admin/halaman-transaksi-penjualan-barang');
    }
    public function delete_cart($id)
    {
        \Cart::remove($id);
        return redirect('/admin/halaman-transaksi-penjualan-barang');
    }
    public function edit_cart(Request $request)
    {
        $get_brg = DB::table('tb_stok AS s')
            ->join('tb_barang AS b', 'b.barang_id', '=', 's.stok_barang_id')
            ->select('*')
            ->where('stok_id', $request->stok_id)
            ->get();
        foreach ($get_brg as $g) {
            $id_stok = $g->stok_id;
            $id_brg = $g->stok_barang_id;
            $stok_ukuran = $g->stok_ukuran;
            $stok_jumlah_stok = $g->stok_jumlah_stok;
            $barang_nama = $g->barang_nama;
            $barang_harga_jual = $g->barang_harga_jual;
        }

        if ($request->qty + $request->jml_skrg >= $stok_jumlah_stok) {
            return redirect('/admin/halaman-transaksi-penjualan-barang')->with('alert', ',Stok Kurang !');
        } else {

            \Cart::update($request->id_row, array(
                'quantity' => $request->qty,
            ));
        }



        return redirect('/admin/halaman-transaksi-penjualan-barang');
    }
    public function destroy_cart()
    {

        \Cart::clear();
        return redirect('/admin/halaman-transaksi-penjualan-barang');
        // $items = \Cart::getContent();
        // return var_dump($items);
    }
}
