<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class co_admAdmin extends Controller
{
    //
    public function index() {
        
        $data = [
            'title' => "Dashboard Admin",
            'breadcrumb' => "Dashboard"
        ];
        
        return view ('admin/dsh_dashboard', $data);
    }
    
    public function profile() {
        $user = DB::table('tb_admin')->get();
        $jmlbarang = DB::table('tb_barang')->count();
        $jmlcust = DB::table('tb_costumer')->count();
        
        $data = [
            'title' => "Profile",
            'breadcrumb' => "Profile Admin",
            'dataAdmin' => $user,
            'jmlbarang' => $jmlbarang,
            'jmlcust' => $jmlcust
        ];
        
        return view ('admin/dsh_profile', $data);
    }
}
