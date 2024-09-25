<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Services\Admin\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{   
    protected $categoryService;

    public function __construct(CategoryService $categoryService){
        $this->categoryService = $categoryService;    
    }

    public function index(){
        $data = array(
            'title'         => "Categories",
            'categories'    => $this->categoryService->getCategories()
        );
        return view('admin.category.index')->with($data);
    }

    public function store(CategoryRequest $req){
        
        $msg = (isset($req->category_id)) ?  __('error_messages.category_update_success') :  __('error_messages.store_category_error');
        try {
            $this->categoryService->store($req->validated());
            return to_route('admin.categories.index')->with('success',$msg);
        } catch (\Exception $e) {
            return to_route('admin.categories.index')->withInput()->with('error', __('error_messages.store_category_error'));
        }
    }

    public function edit($category_id){
        $data = array(
            'title'         => "Categories",
            'categories'    => $this->categoryService->getCategories(),
            'edit_category' => $this->categoryService->edit($category_id),
            'is_update'     => true,
        );
        return view('admin.category.index')->with($data);
    }

    public function delete($category_id){
        $this->categoryService->delete($category_id);
        return to_route('admin.categories.index')->with('success', __('error_messages.category_delete_success'));
    }

    // public function updateList(Request $req):bool{
    //     return $this->categoryService->updateList($req->data);
    // }
}
