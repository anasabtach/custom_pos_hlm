<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Services\Admin\LogService;

class LogController extends Controller
{
    protected $service;

    public function __construct(LogService $service)
    {
        $this->service = $service;
    }

    public function index(){
        $data = [
            'title' => 'logs',
            'logs'  => $this->service->getLogs(),
        ];
        return view('admin.logs.index')->with($data);
    }

    // Your controller methods here
}