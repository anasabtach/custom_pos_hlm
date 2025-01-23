<?php

namespace App\Repository\Admin;

use App\Interfaces\Admin\CustomerInterface;
use App\Models\Country;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Collection;

class CustomerRepository implements CustomerInterface
{
    public $customer;
    
    public function __construct(Customer $customer)
    {
        $this->customer = $customer;    
    }
    public function store(array $data): Customer
    {       
        return $this->customer->create([
            'admin_id'      => auth()->id(),
            'country_id'    => hashid_decode($data['country_id']),
            'name'          => $data['name'],
            'email'         => $data['email'],
            'phone_no'      => $data['phone_no'],
            'city'          => $data['city'],
            'address'       => $data['address'],
            // 'note'          => $data['note'],
            'dob'          => $data['dob'] ?? now(),
            'country_code' => $data['country_code'],

        ]);
    }

    public function getCustomers(): Collection
    {
        return $this->customer->withTrashed()->latest()->withLog()->get();
    }

    public function edit(string $customer_id):Customer
    {   
        return $this->customer->findOrFail(hashid_decode($customer_id));
    }

    public function update(array $arr):bool
    {   
        return $this->customer->findOrFail(hashid_decode($arr['customer_id']))->update([
            'admin_id'      => auth()->id(),
            'country_id'    => hashid_decode($arr['country_id']),
            'name'          => $arr['name'],
            'email'         => $arr['email'],
            'phone_no'      => $arr['phone_no'],
            'city'          => $arr['city'],
            'address'       => $arr['address'],
            // 'note'          => $arr['note'],
            'dob'          => $arr['dob'],
        ]);
    }

    public function delete(string $customer_id):bool
    {
        return $this->customer->destroy(hashid_decode($customer_id));
    }

    public function getCountries():Collection
    {
        return Country::get();
    }

    public function customersCount():int
    {
        return $this->customer->count();
    }

    public function customerGrowthChart()
    {
        // Example: Fetch customer count grouped by month
        $customerData = Customer::selectRaw('MONTHNAME(created_at) as month, COUNT(id) as total')
            ->groupByRaw('MONTH(created_at), MONTHNAME(created_at)') // Group by both the month number and name
            ->orderByRaw('MONTH(created_at)') // Sort by month number
            ->get();
        return $customerData; // Return this to the view
    }

    public function remarks($remarks, $customer_id):bool
    {
        return $this->customer->where('id', hashid_decode($customer_id))->update(['remarks'=>$remarks]);
    }
}
