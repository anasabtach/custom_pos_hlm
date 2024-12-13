<?php

namespace App\Observers;

use App\Helpers\CommonHelper;
use App\Models\Role;

class RoleObserver
{
    /**
     * Handle the Role "created" event.
     */
    public function created(Role $role): void
    {
        CommonHelper::createLog("Creating role: {$role->name}");

    }

    /**
     * Handle the Role "updated" event.
     */
    public function updated(Role $role): void
    {
        CommonHelper::createLog("Updating role: {$role->name}");

    }

    /**
     * Handle the Role "deleted" event.
     */
    public function deleted(Role $role): void
    {
        CommonHelper::createLog("Deleting role: {$role->name}");

    }

    /**
     * Handle the Role "restored" event.
     */
    public function restored(Role $role): void
    {
        //
    }

    /**
     * Handle the Role "force deleted" event.
     */
    public function forceDeleted(Role $role): void
    {
        //
    }
}
