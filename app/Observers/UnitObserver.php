<?php

namespace App\Observers;

use App\Helpers\CommonHelper;
use App\Models\Unit;

class UnitObserver
{
    /**
     * Handle the Unit "created" event.
     */
    public function created(Unit $unit): void
    {
        CommonHelper::createLog("Creating unit: {$unit->name}");

    }

    /**
     * Handle the Unit "updated" event.
     */
    public function updated(Unit $unit): void
    {
        CommonHelper::createLog("Updating unit: {$unit->name}");

    }

    /**
     * Handle the Unit "deleted" event.
     */
    public function deleted(Unit $unit): void
    {
        CommonHelper::createLog("Deleting unit: {$unit->name}");

    }

    /**
     * Handle the Unit "restored" event.
     */
    public function restored(Unit $unit): void
    {
        //
    }

    /**
     * Handle the Unit "force deleted" event.
     */
    public function forceDeleted(Unit $unit): void
    {
        //
    }
}
