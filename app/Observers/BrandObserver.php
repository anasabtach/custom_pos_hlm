<?php

namespace App\Observers;

use App\Helpers\CommonHelper;
use App\Models\Brand;
use Illuminate\Database\Eloquent\Collection;

class BrandObserver
{
    /**
     * Handle the Brand "created" event.
     */
    // public function retrieved(Brand $brand)
    // {   
    //     if ($brand instanceof Collection) {
    //         CommonHelper::createLog("Brands were retrieved via Brand::get().");
    //     } else {
    //         CommonHelper::createLog("Brand {$brand->name} was retrieved.");
    //     }    
    // }
    

    public function created(Brand $brand): void
    {   
        CommonHelper::createLog("Creating brand: {$brand->name}");

    }

    /**
     * Handle the Brand "updated" event.
     */
    public function updated(Brand $brand): void
    {   
        CommonHelper::createLog("Updating brand: {$brand->name}");

    }

    /**
     * Handle the Brand "deleted" event.
     */
    public function deleted(Brand $brand): void
    {
        CommonHelper::createLog("Deleting brand: {$brand->name}");
    }

    /**
     * Handle the Brand "restored" event.
     */
    public function restored(Brand $brand): void
    {
        //
    }

    /**
     * Handle the Brand "force deleted" event.
     */
    public function forceDeleted(Brand $brand): void
    {
        //
    }
}
