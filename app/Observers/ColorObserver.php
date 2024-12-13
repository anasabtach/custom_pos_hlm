<?php

namespace App\Observers;

use App\Helpers\CommonHelper;
use App\Models\Color;

class ColorObserver
{
    /**
     * Handle the Color "created" event.
     */
    public function created(Color $color): void
    {
        CommonHelper::createLog("Creating color: {$color->name}");

    }

    /**
     * Handle the Color "updated" event.
     */
    public function updated(Color $color): void
    {
        CommonHelper::createLog("Updating color: {$color->name}");

    }

    /**
     * Handle the Color "deleted" event.
     */
    public function deleted(Color $color): void
    {
        CommonHelper::createLog("Deleting color: {$color->name}");

    }

    /**
     * Handle the Color "restored" event.
     */
    public function restored(Color $color): void
    {
        //
    }

    /**
     * Handle the Color "force deleted" event.
     */
    public function forceDeleted(Color $color): void
    {
        //
    }
}
