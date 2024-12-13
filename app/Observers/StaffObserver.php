<?php

namespace App\Observers;

use App\Helpers\CommonHelper;
use App\Models\Admin as Staff;

class StaffObserver
{
    /**
     * Handle the Staff "created" event.
     */
    public function created(Staff $staff): void
    {
        CommonHelper::createLog("Creating staff: {$staff->full_name}");

    }

    /**
     * Handle the Staff "updated" event.
     */
    public function updated(Staff $staff): void
    {
        CommonHelper::createLog("Updating staff: {$staff->full_name}");

    }

    /**
     * Handle the Staff "deleted" event.
     */
    public function deleted(Staff $staff): void
    {
        CommonHelper::createLog("Deleting staff: {$staff->full_name}");
    }

    /**
     * Handle the Staff "restored" event.
     */
    public function restored(Staff $staff): void
    {
        //
    }

    /**
     * Handle the Staff "force deleted" event.
     */
    public function forceDeleted(Staff $staff): void
    {
        //
    }
}
