<?php

namespace App\Observers;

use App\Helpers\CommonHelper;
use App\Models\Customer;

class CustomerObserver
{
    /**
     * Handle the Customer "created" event.
     */
    public function created(Customer $customer): void
    {
        CommonHelper::createLog("Creating customer: {$customer->name}");

    }

    /**
     * Handle the Customer "updated" event.
     */
    public function updated(Customer $customer): void
    {
        CommonHelper::createLog("Updating customer: {$customer->name}");

    }

    /**
     * Handle the Customer "deleted" event.
     */
    public function deleted(Customer $customer): void
    {
        CommonHelper::createLog("Deleting customer: {$customer->name}");

    }

    /**
     * Handle the Customer "restored" event.
     */
    public function restored(Customer $customer): void
    {
        //
    }

    /**
     * Handle the Customer "force deleted" event.
     */
    public function forceDeleted(Customer $customer): void
    {
        //
    }
}
