<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\Computed;

class PosComponent extends Component
{
    public $category_id;  // Holds the selected category ID
    public $items = [];
    // Initialize component (mount lifecycle hook)
    public function mount()
    {
        // Initialize anything here if necessary, like fetching initial data.
    }

    // Computed property for fetching all categories
    #[Computed]
    public function categories()
    {
        return Category::latest()->get();
    }

    // Computed property for fetching products based on selected category
    #[Computed]
    public function products()
    {
        return Product::with(['category', 'unit', 'variations'])
                ->when(!empty($this->category_id) && $this->category_id !== 'all', function($query) {
                    $query->where('category_id', hashid_decode($this->category_id));  // Ensure hashid_decode is properly set up
                })
                ->get(); 
    }

    // Computed property for fetching all customers
    #[Computed]
    public function customers()
    {
        return Customer::latest()->get(); 
    }

    // Handle category selection
    public function checkClick($category_id)
    {
        $this->category_id = $category_id;  // Update the selected category ID
    }

    public function addItems($product_name, $sku, $product_id, $stock, $price, $is_variaton=0){
        if (array_key_exists($sku, $this->items)) {
                $this->items[$sku]['quantity'] += 1;
        } else {
            $this->items[$sku] = [
                'product_name' => $product_name,
                'sku'          => $sku,
                'product_id'   => $product_id,
                'stock'        => $stock,
                'is_variaton'  => $is_variaton,
                'price'         => $price,
                'quantity'     => 1,
            ];
        }

    }

    // Render method to return the view
    public function render()
    {
        return view('livewire.pos-component');
    }
}
