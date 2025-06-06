<?php

namespace App\Repository\Admin;

use App\Helpers\CommonHelper;
use App\Interfaces\Admin\SupplierInterface;
use App\Models\Country;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Collection;

class SupplierRepository implements SupplierInterface
{
    public $supplier;
    
    public function __construct(Supplier $supplier)
    {
        $this->supplier = $supplier;    
    }

    public function store(array $data): Supplier
    {       
        return $this->supplier->create([
            'admin_id'      => auth()->id(),
            'country_id'    => hashid_decode($data['country_id']),
            'name'          => $data['name'],
            'email'         => $data['email'],
            'phone_no'      => $data['phone_no'],
            'city'          => $data['city'],
            'address'       => $data['address'],
            'note'          => $data['note'],
            'trn'           => $data['trn'],
            'country_code'  => $data['country_code'],
        ]);
    }

    public function getSuppliers(): Collection
    {
        return $this->supplier->with(['offeredProducts'])->withTrashed()->latest()->withLog()->get();
    }

    public function edit(string $supplier_id):Supplier
    {   
        return $this->supplier->with(['trnDocuments'])->withTrashed()->findOrFail(hashid_decode($supplier_id));
    }

    public function update(array $arr):Supplier
    {   
        $supplier = $this->supplier->withTrashed()->findOrFail(hashid_decode($arr['supplier_id'])); // Find the supplier model

        $supplier->update([ // Update the supplier model
            'admin_id'      => auth()->id(),
            'country_id'    => hashid_decode($arr['country_id']),
            'name'          => $arr['name'],
            'email'         => $arr['email'],
            'phone_no'      => $arr['phone_no'],
            'city'          => $arr['city'],
            'address'       => $arr['address'],
            'note'          => $arr['note'],
            'trn'           => $arr['trn'],
        ]);
        
        return $supplier; // Return the updated supplier model
    }

    public function delete(string $supplier_id):bool
    {
        return $this->supplier->destroy(hashid_decode($supplier_id));
    }

    public function getCountries():Collection
    {
        return Country::get();
    }

    public function suppliersCount():int
    {
        return $this->supplier->count();
    }

    public function remarks($remarks, $supplier_id):bool
    {
        return $this->supplier->where('id', hashid_decode($supplier_id))->update(['remarks'=>$remarks]);
    }

    public function storeTrnDocuments(array $images, Supplier $supplier): void
    {
        if(!empty($images)){
            foreach ($images as $image) {
                $path = CommonHelper::uploadSingleImage($image, 'trn_documents', false);
                $supplier->trnDocuments()->create([
                    'filename' => $path['image'],
                ]);
            }
        }
    }

    public function deleteTrxDocuments($supplier_id, $document_id):bool
    {
        return $this->supplier
                ->findOrFail(hashid_decode($supplier_id))
                ->trnDocuments()
                ->where('id', hashid_decode($document_id))
                ->delete();    
    }

}
