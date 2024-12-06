<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CustomerRequest;
use App\Http\Requests\Admin\RemarkRequest;
use App\Services\Admin\CustomerService;

class CustomerController extends Controller
{
    protected $service;

    public function __construct(CustomerService $service){
        $this->service = $service;    
    }

    public function index(){
        rights('view-customer');
        $data = array(
            'title'         => "Customers",
            'customers'     => $this->service->getCustomers(),
        );
        return view('admin.customer.index')->with($data);
    }

    public function create(){
        $data = [
            'title'         => 'Create Customer',
            'countries'     => $this->service->getCountries(),
        ];
        return view('admin.customer.add')->with($data);
    }

    public function store(CustomerRequest $req){
        $msg = (isset($req->customer_id)) ?  __('error_messages.customer_update_success') :  __('error_messages.customer_add_success');//send update message when brand_id is set
        try {
            $this->service->store($req->validated());
            return to_route('admin.customers.index')->with('success',$msg);
        } catch (\Exception $e) {
            // dd($e->getMessage());
            return to_route('admin.customers.index')->withInput()->with('error', __('error_messages.customer_add_error'));
        }
    }

    public function edit($customer_id){
        rights('edit-customer');
        $data = array(
            'title'         => "Edit Customer",
            'countries'     => $this->service->getCountries(),
            'edit_customer' => $this->service->edit($customer_id),
            'is_update'     => true,
        );
        return view('admin.customer.add')->with($data);
    }

    public function delete(RemarkRequest $req, $customer_id){
        rights('delete-customer');
        $this->service->remarks($req->remarks, $customer_id);
        $this->service->delete($customer_id);
        return to_route('admin.customers.index')->with('success', __('error_messages.customer_delete_success'));
    }
}