<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index(){

    	// mengambil data dari fbsql_database
    	$data['latest'] = DB::table('tb_barang')
    	->orderBy('idBrg', 'desc')
    	->limit(8)
    	->get();

    	return view('content/index', $data);
    }
}
