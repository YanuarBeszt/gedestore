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
        if($check == 0){
            $number = "TRX-000000000";
        } else {
            foreach($brgid as $brgidd) {
               $number = $brgidd->transaksi_nomor;
            }
        }
        $lastnumb = (int) substr($number, 9, 9);
        $lastnumb++;
        $char = "TRX-";
        $lastkode = $char.sprintf("%09s", $lastnumb);
        // === end generate kode transaksi ===

        $brg = DB::table('tb_stok AS s')
        ->join('tb_barang AS b', 'b.barang_id', '=', 's.stok_barang_id')
        ->select('*')
        ->get();

        $cart = \Cart::getContent();
        $jml_crt = \Cart::getContent()->count();

        $data = [
            'title' => "Transaksi",
            'breadcrumb' => "Transaksi Penjualan",
            'kode_trans' => $lastkode,
            'barang' => $brg,
            'cart' => $cart,
            'jml_crt' => $jml_crt,
        ];

        return view('admin/tr_barangKeluar', $data);
    }
    public function add_cart(Request $request){

        $brg = \Cart::getContent();

        $jml_crt = \Cart::getContent()->count();

        if ($jml_crt > 0) {
            foreach ($brg as $key ) {
                $cek_size = $key->attributes->size;
                $cek_id = $key->attributes->kode_brg;

                if ($key->attributes->size == $request->ukuran && $key->attributes->kode_brg == $request->id) {
                    // \Cart::add(array(
                    //       'id' => $key->id,
                    //       'name' => $request->nama,
                    //       'price' => $request->harga,
                    //       'quantity' => $request->qty,
                    //       'attributes' => array(
                    //                     'kode_brg' => $request->id,
                    //                      'size' => $request->ukuran,
                    //       )
                    // ));
                        \Cart::update($key->id, array(
                          'quantity' => 1, 
                        ));
                    break;
                } else {
                    \Cart::add(array(
                          'id' => uniqid(),
                          'name' => $request->nama,
                          'price' => $request->harga,
                          'quantity' => $request->qty,
                          'attributes' => array(
                                        'kode_brg' => $request->id,
                                         'size' => $request->ukuran,
                          )
                    ));
                    break;
                }
                    
            }

        } else {
                    \Cart::add(array(
                          'id' => uniqid(),
                          'name' => $request->nama,
                          'price' => $request->harga,
                          'quantity' => $request->qty,
                          'attributes' => array(
                                        'kode_brg' => $request->id,
                                         'size' => $request->ukuran,
                          )
                    ));
        }
        




        // $items = \Cart::getContent();
        // return $items;
               return redirect('/admin/halaman-transaksi-penjualan-barang');

    }
    public function delete_cart($id){
        \Cart::remove($id);
       return redirect('/admin/halaman-transaksi-penjualan-barang');

    }

    public function destroy_cart(){

       \Cart::clear();  
       return redirect('/admin/halaman-transaksi-penjualan-barang');
        // $items = \Cart::getContent();
        // return var_dump($items);
    }
}
