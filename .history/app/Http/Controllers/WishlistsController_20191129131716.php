<?php

namespace App\Http\Controllers;

use App\Wishlist;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class WishlistsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        if($request->session()->exists('login_user')) {
            /*showing data from table to view
            ['wishlists' => $wishlists] -> compact function , we can use compact function because same*/
            $wishlists = DB::table('tb_wishlists')->where('wishlist_userid', session('user_id'))
            ->leftJoin('tb_barang','tb_wishlists.wishlist_barangId', '=' , 'tb_barang.barang_id')->get();
              
            return view('wishlists.index', compact('wishlists'));

        } 
        return view('wishlists.blank');
        
    }

    
    public function addToWishlists(Request $request)
    {

        if(!empty($request)){
            DB::table('tb_wishlists')->insert([
                'wishlist_userid' => $request->wishlist_userid,
                'wishlist_barangid' => $request->wishlists_barangid        
            ]);

            return redirect('/wishlists')->with('success', 'wishlist berhasil ditambahkan');

        } else {

            return redirect('wishlist')->with('alert', 'wishlist gagal ditambahkan');
        }

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
    public function destroy(Wishlist $wishlist)
    {
        //
    }
}
