<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PemesananController extends Controller
{
    //
    public function pesanOnline() {
        
        $data = [
            'title' => "Pesanan Online",
            'breadcrumb' => "Pesanan Online"
        ];
        
        return view ('admin/psn_Online', $data);
    }
    
    public function pesanOffline() {
        
        $data = [
            'title' => "Pesanan Offline",
            'breadcrumb' => "Pesanan Offline"
        ];
        
        return view ('admin/psn_Offline', $data);
    }
}
