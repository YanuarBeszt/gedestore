<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function index()
    {

        $data['barang'] = DB::table('tb_barang')->get();

        return view('content/shop', $data);
    }

    public function showProduct(Product $product)
    {
        return view('content/shop/details', compact('product'));
    }
}
