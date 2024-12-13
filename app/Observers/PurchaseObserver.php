<?php

namespace App\Observers;

use App\Helpers\CommonHelper;
use App\Models\Purchase;

class PurchaseObserver
{
    /**
     * Handle the Purchase "created" event.
     */
    public function created(Purchase $purchase): void
    {
        CommonHelper::createLog("Creating purchase: {$purchase->slug}");

    }

    /**
     * Handle the Purchase "updated" event.
     */
    public function updated(Purchase $purchase): void
    {
        CommonHelper::createLog("Updating purchase: {$purchase->slug}");

    }

    /**
     * Handle the Purchase "deleted" event.
     */
    public function deleted(Purchase $purchase): void
    {
        CommonHelper::createLog("Deleting purchase: {$purchase->slug}");

    }

    /**
     * Handle the Purchase "restored" event.
     */
    public function restored(Purchase $purchase): void
    {
        //
    }

    /**
     * Handle the Purchase "force deleted" event.
     */
    public function forceDeleted(Purchase $purchase): void
    {
        //
    }
}
