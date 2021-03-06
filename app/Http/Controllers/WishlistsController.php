<?php

namespace App\Http\Controllers;

use App\Wishlist;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Datetime;


class WishlistsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->session()->exists('login_user')) {
            /*showing data from table to view
            ['wishlists' => $wishlists] -> compact function , we can use compact function because same*/
            $wishlists = DB::table('tb_wishlists')->where('wishlist_userid', session('user_id'))
                ->leftJoin('tb_barang', 'tb_wishlists.wishlist_barangId', '=', 'tb_barang.barang_id')->get();

            return view('wishlists.index', compact('wishlists'));
        }
        return view('wishlists.blank');
    }


    public function addToWishlists($idbarang, $iduser, Request $request)
    {
        $now = new DateTime();

        DB::table('tb_wishlists')->insert([
            'wishlist_userid' => $iduser,
            'wishlist_barangid' => $idbarang,
            'created_at' => $now
        ]);

        return redirect('/shop')->with('success', 'wishlist berhasil ditambahkan');
    }

    public function addToWishlistser($idbarang)
    {

        return redirect('/shop/showProduct/' . $idbarang)->with('alert', 'Silahkan login Terlebih Dahulu');
    }

    public function delWishlists($wishlist_id)
    {

        Wishlist::destroy($wishlist_id);
        return redirect('/wishlists')->with('status', 'Item Berhasil dihapus');
    }


    public function cart()
    {
        return view('cart/index');
    }

    public function confirm()
    {
        return view('cart/confirm');
    }

    public function checkout()
    {
        return view('cart/checkout');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function show(Wishlist $wishlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function edit(Wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wishlist $wishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wishlist $wishlists)
    { }
}
