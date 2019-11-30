<?php

namespace App\Http\Controllers;
use Gloudemans\Shoppingcart\Facades\Cart;
//use Darryldecode\Cart\Cart;
//use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('keranjang/keranjang');
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
    public function store(Request $request)
    {
//        echo $request.'<hr>';
        Cart::add($request->stok_id, $request->stok_ukuran, 1, $request->price);
//        Cart::add(1, 'xl' , 1, 1);
        foreach(Cart::content() as $item) {
//               if($item > 0) {
//                   $detail = new Detail([
//                        'product_id' => $item->model->id,
//                       'product_name' => $item->model->price * $item->qty,
//                       'product_price' => $item->model->price,
//                       'product_qty' => $item->qty
//                   ]);
               echo $item . "<br>";
        }
//        echo $request->stok_id;
//        return redirect()->route('keranjang.index')->with('success_message', 'Barang sudah ditambahkan ke dalam keranjang!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
