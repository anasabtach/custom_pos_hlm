<?php

namespace App\Listeners;

use App\Events\StaffRegisteredEvent;
use App\Mail\StaffRegisteredMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class StaffRegisteredListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        
    }

    /**
     * Handle the event.
     */
    public function handle(StaffRegisteredEvent $event): void
    {   
        Mail::to($event->email)->send(new StaffRegisteredMail($event->email, $event->password));
    }
}
