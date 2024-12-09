<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ColorRequest;
use App\Http\Requests\Admin\RemarkRequest;
use App\Services\Admin\ColorService;


class ColorController extends Controller
{   
    protected $service;

    public function __construct(ColorService $service){
        $this->service = $service;    
    }

    public function index(){
        rights('view-brand');
        $data = array(
            'title'         => "Colors",
            'colors'    => $this->service->getColors()
        );
        return view('admin.color.index')->with($data);
    }

    public function store(ColorRequest $req){
        $msg = (isset($req->color_id)) ?  __('error_messages.color_update_success') :  __('error_messages.color_add_success');//send update message when color_id is set
        try {
            $this->service->store($req->validated());
            return to_route('admin.colors.index')->with('success',$msg);
        } catch (\Exception $e) {
            return to_route('admin.colors.index')->withInput()->with('error', __('error_messages.color_add_error'));
        }
    }

    public function edit($color_id){
        rights('edit-brand');
        $data = array(
            'title'         => "Colors",
            'colors'    => $this->service->getColors(),
            'edit_color' => $this->service->edit($color_id),
            'is_update'     => true,
        );
        return view('admin.color.index')->with($data);
    }

    public function delete(RemarkRequest $req, $color_id){
        rights('delete-brand');
        // $this->service->remarks($req->remarks, $color_id);
        $this->service->delete($color_id);
        return to_route('admin.colors.index')->with('success', __('error_messages.color_delete_success'));
    }
}
