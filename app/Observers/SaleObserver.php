<?php

namespace App\Observers;

use App\Helpers\CommonHelper;
use App\Models\Sale;

class SaleObserver
{
    /**
     * Handle the Sale "created" event.
     */
    public function created(Sale $sale): void
    {
        CommonHelper::createLog("Creating sale: {$sale->sale_id}");

    }

    /**
     * Handle the Sale "updated" event.
     */
    public function updated(Sale $sale): void
    {
        CommonHelper::createLog("Updating sale: {$sale->sale_id}");

    }

    /**
     * Handle the Sale "deleted" event.
     */
    public function deleted(Sale $sale): void
    {
        CommonHelper::createLog("Deleting sale: {$sale->sale_id}");

    }

    /**
     * Handle the Sale "restored" event.
     */
    public function restored(Sale $sale): void
    {
        //
    }

    /**
     * Handle the Sale "force deleted" event.
     */
    public function forceDeleted(Sale $sale): void
    {
        //
    }
}
