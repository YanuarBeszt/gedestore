<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class co_admInventory extends Controller
{
    //
    public function index() {
        
        $data = [
            'title' => "Inventory",
            'breadcrumb' => "Inventory"
        ];
        
        return view ('admin/inv_dashboard', $data);
    }
}
