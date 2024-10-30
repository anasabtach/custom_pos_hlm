<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\PosService;

class PosController extends Controller
{
    protected $service;

    public function __construct(PosService $service)
    {   
        $this->service = $service;
    }

    public function index(){
        $data = [
            'title' => 'POS'
        ];
        return view('admin.pos.index')->with($data);
    }

    public function generateBill($id){
        $data = [
            'title' => 'Bill',
            'bill_data'  => $this->service->bill($id),
        ];
        return view('admin.pos.bill')->with($data);
    }
}