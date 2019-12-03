<?php

namespace App\Http\Controllers;
use Darryldecode\Cart\Facades\CartFacade;
use Darryldecode\Cart\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;
class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['jml_crt'] = \Cart::getContent()->count();

        $data['cart'] = \Cart::getContent();
        $data['total'] = \Cart::getSubTotal();

        return view('keranjang/keranjang', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function tambah_cart(Request $request){



        $jml_crt = \Cart::getContent()->count();

        $brg = \Cart::getContent();

        $get_brg = DB::table('tb_stok AS s')
            ->join('tb_barang AS b', 'b.barang_id', '=', 's.stok_barang_id')
            ->select('*')
            ->where('stok_id', $request->stok_ukuran)
            ->get();
        foreach ($get_brg as $g) {


            $stok_jumlah_stok = $g->stok_jumlah_stok;
            $ukuran = $g->stok_ukuran;

        }

        if ($jml_crt > 0) {

            foreach ($brg as $key ) {


                if ($key->attributes->size == $request->stok_ukuran && $key->attributes->kode_brg == $request->barang_id) {

                        \Cart::update($key->id, array(
                          'quantity' => 1, 
                        ));
                    break;
                } else {
                    \Cart::add(array(
                          'id' => uniqid(),
                          'name' => $request->barang_nama,
                          'price' => $request->price,
                          'quantity' => 1,
                          'attributes' => array(
                                        'kode_brg' => $request->barang_id,
                                         'size' => $ukuran,
                                         'gambar' => $request->barang_gambar,
                                         'stok_id' => $request->stok_ukuran,
                                         'jml_stok_gudang' => $stok_jumlah_stok

                          )
                    ));
                    break;
                }
                    
            }

        } else {
                    \Cart::add(array(
                          'id' => uniqid(),
                          'name' => $request->barang_nama,
                          'price' => $request->price,
                          'quantity' => 1,
                          'attributes' => array(
                                        'kode_brg' => $request->barang_id,
                                         'size' => $ukuran,
                                         'gambar' => $request->barang_gambar,
                                         'stok_id' => $request->stok_ukuran,
                                         'jml_stok_gudang' => $stok_jumlah_stok

                          )
                    ));
        }
        

        // $items = \Cart::getContent();
        // return $brg;
        return redirect()->back()->with('success', 'Tambah Barang Kedalam keranjang');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_cart($id){
        \Cart::remove($id);
       return redirect('/keranjang-shop');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_cart(Request $request){
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

        if ($request->qty_edit+$request->jml_skrg >= $stok_jumlah_stok) {
            return redirect('/keranjang-shop')->with('alert', ',Stok Kurang !');


        } else {
            
            \Cart::update($request->id_row, array(
                'quantity' => $request->qty_edit,
            ));
          
        }


       return redirect('/keranjang-shop');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_cart(){

        \Cart::clear();  
        return redirect('/keranjang-shop');
         // $items = \Cart::getContent();
         // return var_dump($items);
     }
}
