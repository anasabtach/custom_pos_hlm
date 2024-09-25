<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Services\Admin\CategoryService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{   
    protected $categoryService;

    public function __construct(CategoryService $categoryService){
        $this->categoryService = $categoryService;    
    }

    public function index():View{
        $data = array(
            'title'         => "Categories",
            'categories'    => $this->categoryService->getCategories()
        );
        return view('admin.category.index')->with($data);
    }

    public function store(CategoryRequest $req){
        try {
            $this->categoryService->store($req->validated());
            return to_route('admin.categories.index')->with('success', __('error_messages.store_category_success'));
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', __('error_messages.store_category_success'));
        }
    }

    public function updateList(Request $req):bool{
        return $this->categoryService->updateList($req->data);
    }
}
