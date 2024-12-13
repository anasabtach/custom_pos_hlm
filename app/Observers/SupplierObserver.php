<?php

namespace App\Observers;

use App\Helpers\CommonHelper;
use App\Models\Supplier;

class SupplierObserver
{
    /**
     * Handle the Supplier "created" event.
     */
    public function created(Supplier $supplier): void
    {
        CommonHelper::createLog("Creating supplier: {$supplier->name}");

    }

    /**
     * Handle the Supplier "updated" event.
     */
    public function updated(Supplier $supplier): void
    {
        CommonHelper::createLog("Updating supplier: {$supplier->name}");

    }

    /**
     * Handle the Supplier "deleted" event.
     */
    public function deleted(Supplier $supplier): void
    {
        CommonHelper::createLog("Deleting supplier: {$supplier->name}");

    }

    /**
     * Handle the Supplier "restored" event.
     */
    public function restored(Supplier $supplier): void
    {
        //
    }

    /**
     * Handle the Supplier "force deleted" event.
     */
    public function forceDeleted(Supplier $supplier): void
    {
        //
    }
}
