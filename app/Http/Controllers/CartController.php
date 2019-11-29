<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Session;

class CartController extends Controller
{

    function cartView()
    {
        return view('content/cart');
    }

    public function addCart($id)
    {
        if (Session::get('login_user')) {
            $product = DB::table('tb_stok')
                ->select('*', DB::raw('SUM(stok_jumlah_stok) as total'))
                ->join('tb_barang', 'tb_barang.barang_id', '=', 'tb_stok.stok_barang_id')
                ->join('tb_kategori', 'tb_barang.barang_kategori_id', '=', 'tb_kategori.kategori_id')
                ->where('barang_id', '=', $id)
                ->get();

            foreach ($product as $p) {
                $data['barang_id'] = $p->barang_id;
                $data['barang_nama'] = $p->barang_nama;
                $data['barang_harga_jual'] = $p->barang_harga_jual;
                $data['barang_deskripsi'] = $p->barang_deskripsi;
                $data['barang_gambar'] = $p->barang_gambar;
                $data['kategori_nama'] = $p->kategori_nama;
            }

            if (!$product) {

                abort(404);
            }

            $cart = Session::get('cart');

            // jika cartnya kosong
            if (!$cart) {

                $cart = [
                    $id => [
                        "barang_id" => $data['barang_id'],
                        "barang_nama" => $data['barang_nama'],
                        "jumlah" => 1,
                        "barang_harga_jual" => $data['barang_harga_jual'],
                        "barang_gambar" => $data['barang_gambar'],
                    ]
                ];

                Session::put('cart', $cart);

                return redirect()->back()->with('success', 'Product berhasil ditambahkan ke cart kamu!');
            }

            if (isset($cart[$id])) {

                $cart[$id]['quantity']++;

                Session::put('cart', $cart);

                return redirect()->back()->with('success', 'Product berhasil ditambahkan ke cart kamu!');
            }

            // if item not exist in cart then add to cart with quantity = 1
            $cart[$id] = [
                "barang_id" => $data['barang_id'],
                "barang_nama" => $data['barang_nama'],
                "jumlah" => 1,
                "barang_harga_jual" => $data['barang_harga_jual'],
                "barang_gambar" => $data['barang_gambar'],
            ];

            Session::put('cart', $cart);

            return redirect()->back()->with('success', 'Product berhasil ditambahkan ke cart kamu!');
        } else {
            Session::put('redirect_login', 'true');
            return redirect('customer/login')->with('alert', 'Silahkan login terlebih dahulu !');
        }
    }
    //
}
