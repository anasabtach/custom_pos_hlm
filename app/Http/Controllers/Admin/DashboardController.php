<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index():View{
        $data = array(
            'title' => 'Dashboard'
        );
        return view('admin.dashboard.index')->with($data);
    }
}
