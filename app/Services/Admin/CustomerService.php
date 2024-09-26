<?php

namespace App\Services\Admin;

use App\Helpers\CommonHelper;
use App\Interfaces\Admin\CustomerInterface;

use Illuminate\Database\Eloquent\Collection;

class CustomerService{
    
    protected $repository;

    public function __construct(CustomerInterface $repository){
        $this->repository = $repository;
    }

    public function getCustomers():Collection{
        return $this->repository->getCustomers();
    }

    public function store(array $data){
        return (isset($data['customer_id'])) ? $this->repository->update($data) : $this->repository->store($data);
    }

    public function edit($customer_id){
        return $this->repository->edit($customer_id);
    }

    public function delete($customer_id){
        return $this->repository->delete($customer_id);
    }

    public function getCountries(){
        return $this->repository->getCountries();
    }
}