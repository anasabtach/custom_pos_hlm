<?php

namespace App\Observers;

use App\Helpers\CommonHelper;
use App\Models\Product;

class ProductObserver
{
    /**
     * Handle the Product "created" event.
     */
    public function created(Product $product): void
    {
        CommonHelper::createLog("Creating product: {$product->name}");

    }

    /**
     * Handle the Product "updated" event.
     */
    public function updated(Product $product): void
    {
        CommonHelper::createLog("Updating product: {$product->name}");

    }

    /**
     * Handle the Product "deleted" event.
     */
    public function deleted(Product $product): void
    {
        CommonHelper::createLog("Deleting product: {$product->name}");

    }

    /**
     * Handle the Product "restored" event.
     */
    public function restored(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "force deleted" event.
     */
    public function forceDeleted(Product $product): void
    {
        //
    }
}
