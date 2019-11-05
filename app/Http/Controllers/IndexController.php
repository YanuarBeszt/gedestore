<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
	public function index()
	{

		// mengambil data dari fbsql_database

		$barang = DB::table('tb_stok')
			->select('*', DB::raw('SUM(stok_jumlah_stok) as total'))
			->join('tb_barang', 'tb_barang.barang_id', '=', 'tb_stok.stok_barang_id')
			->groupBy('barang_id')
			->get();

		$data = [
			'barang' => $barang
		];

		return view('content/index', $data);
	}
}
