<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(){

    }

    public function index(){
        $data = [
            'title' => 'Products'
        ];
        return view('admin.products.index')->with($data);
    }
}
