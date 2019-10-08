<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class co_admDashboard extends Controller
{
    //
    public function index() {
        
        $data = [
            'title' => "Dashboard Admin",
            'breadcrumb' => "Dashboard"
        ];
        
        return view ('admin/dsh_dashboard', $data);
    }
}
