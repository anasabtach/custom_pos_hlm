<?php

namespace App\Listeners;

use App\Events\StaffRegisteredEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class StaffRegisteredListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(StaffRegisteredEvent $event): void
    {
        //
    }
}
