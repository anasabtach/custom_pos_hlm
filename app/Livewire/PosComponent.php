<?php

namespace App\Livewire;

use App\Helpers\CommonHelper;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Sale;
use App\Repository\Admin\WordPressProductRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\Attributes\Computed;

class PosComponent extends Component
{
    public $category_id;  // Holds the selected category ID
    public $customer_id;
    public $items = [];
    public $recieved_amount = '';
    public $return_amount = null;
    public $edit_bill     = null;
    
    public $total = [
        'total' => 0
    ];
    // Initialize component (mount lifecycle hook)
    public function mount()
    {
        // Initialize anything here if necessary, like fetching initial data.
    }

    public function updatedCustomerId($value)
    {
        session()->forget('select_customer_error');

    }

    // Computed property for fetching all categories
    #[Computed]
    public function categories()
    {
        return Category::latest()->get();
    }

    #[Computed]
    public function recentBills(){
//        return Sale::with(['customer'])->latest()->get();
        return Sale::with(['customer'])->whereDate('created_at', now())->latest()->get();
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
    {   //dd($category_id);
        $this->category_id = $category_id;  // Update the selected category ID
    }

    public function addItems($product_name, $sku, $product_id, $stock, $price, $is_variaton=0, $product_variation_id=null){
        if (array_key_exists($sku, $this->items)) {
                $this->items[$sku]['quantity'] += 1;
        } else {
            $this->items[$sku] = [
                'product_name' => $product_name,
                'sku'          => $sku,
                'product_id'   => $product_id,
                'product_variation_id'   => $product_variation_id,
                'stock'        => $stock,
                'is_variaton'  => $is_variaton,
                'price'         =>$price,
                'quantity'     => 1,
            ];
        }
        $this->calculateTotal();
        $this->return_amount = null;
        $this->recieved_amount = null;
    }

    public function updaeItemQuantity($sku, $value){
        $this->items[$sku]['quantity'] = $value;
        $this->calculateTotal();
    }

    public function removeItem($sku){//remove item
        unset($this->items[$sku]);
        $this->calculateTotal();
    }

    public function calculateTotal(){
        $total = 0;
        if(!empty($this->items)){
            foreach($this->items AS $item){
                if(!empty($item['quantity'])){
                    $total += $item['price'] * $item['quantity'];
                }
            }
        }
        $this->total['total'] = $total;
    }

    // public function setCustomer($customer_id){
    //     $this->customer_id = $customer_id;
    // }

    public function calculateReturnAmount(){
        if(!empty($this->items) && !empty($this->recieved_amount)){
            $this->return_amount = $this->recieved_amount - $this->total['total'];
        }
    }

    public function updateRecievedAmount($value){
        $this->recieved_amount = $value;
        $this->calculateReturnAmount();
    }

    public function generateBill(){
        if($this->customer_id){
            try{
                DB::transaction(function(){
                    if(!is_null($this->edit_bill)){
                        $sale = Sale::findOrFail(hashid_decode($this->edit_bill));
                        $sale->saleItems()->delete();
                        $sale->update(($this->saleArr()));
                    }else{
                        $sale = Sale::create($this->saleArr());
                    }
                    $sale->saleItems()->createMany($this->saleItemArr());
                    $this->deductProductStock(collect($this->saleItemArr())->pluck('quantity', 'product_id'));
                    $this->resetProperties();
                    $this->dispatch('bill-generated', success:true, sale_id:$sale->hashid);
                    session()->forget('select_customer_error');
                });
            }catch(Exception $e){
                $this->dispatch('bill-generated', success:false,);
            }
        }else{
            session()->flash('select_customer_error', 'Please select the customer.');
        }
    }

    public function saleArr() {
        $saleData = [
            'admin_id'        => auth()->id(),
            'customer_id'     => hashid_decode($this->customer_id),
            'received_amount' => $this->recieved_amount,
            'discount'        => 0,
            'return_amount'   => $this->return_amount,
            'subtotal'        => 0,
            'total'           => $this->total['total'],
        ];
    
        if (is_null($this->edit_bill)) {
            $saleData['sale_id'] = CommonHelper::generateId('sales', 'sale_id');
        }    
        return $saleData;
    }
    

    public function saleItemArr(){
        $arr = [];
        foreach($this->items AS $item){
            $arr [] = [
                'product_id'              => hashid_decode($item['product_id']),
                'product_variation_id'    => ($item['is_variaton']) ? hashid_decode($item['product_variation_id']) : null,
                'price'                   => $item['price'],
                'quantity'                => $item['quantity'],
                'total'                   => $item['quantity'] * $item['price'],
            ];
        }
        return $arr;
    }
    
    public function resetProperties(){
        $this->reset('category_id');
        $this->reset('customer_id');
        $this->reset('items');
        $this->reset('recieved_amount');
        $this->reset('return_amount');
        $this->reset('total');
    }

    public function editBill($bill_id){
        $sale = Sale::with(['saleItems.product', 'saleItems.productVariation.unit'])->findOrFail(hashid_decode($bill_id));
        foreach ($sale->saleItems as $sale_item) {
            $product = $sale_item->product_variation_id ? $sale_item->productVariation : $sale_item->product;
            
            $product_name = $sale_item->product->name;
            if ($sale_item->product_variation_id) {
                $product_name .= " | {$product->unit->name}";
            }
            $sku = $product->sku;
            $product_id             = hashid_encode($sale_item->product_id);
            $stock                  = $product->stock;
            $price                  = $product->price;
            $is_variation           = $sale_item->product_variation_id ? 1 : 0;
            $product_variation_id   = $is_variation ? hashid_encode($sale_item->product_variation_id) : null;
            $quantity               = $sale_item->quantity;
        
            $this->editItemsList($product_name, $sku, $product_id, $stock, $price, $is_variation, $quantity, $product_variation_id);
        }
        $this->return_amount    = $sale->return_amount;
        $this->recieved_amount  = $sale->received_amount;
        $this->total['total']   = $sale->total;
        $this->customer_id      = hashid_encode($sale->customer_id);
        $this->edit_bill = $bill_id; 
    }

    public function editItemsList($product_name, $sku, $product_id, $stock, $price, $is_variaton=0, $quantity, $product_variation_id=null){
            $this->items[$sku] = [
                'product_name' => $product_name,
                'sku'          => $sku,
                'product_id'   => $product_id,
                'product_variation_id'   => $product_variation_id,
                'stock'        => $stock,
                'is_variaton'  => $is_variaton,
                'price'         =>$price,
                'quantity'     => $quantity,
            ];
    }
    
    public function deductProductStock($arr){
        $wordpressRepository = new WordPressProductRepository();
        foreach($arr AS $product_id=>$product_stock){
            $product = Product::findOrFail($product_id);
            $product->stock -= $product_stock; 
            $product->save(); 
            if(isset($product->wordpress_id)){
                $wordpressRepository->updateSingleProductStock($product->wordpress_id, $product->stock);
            }
        }
    }
    
    public function placeholder(array $params = [])
    {
        return view('livewire.placeholders.skeleton', $params);
    }

    // Render method to return the view
    public function render()
    {
        return view('livewire.pos-component');
    }
}
