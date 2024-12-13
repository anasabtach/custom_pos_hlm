<?php

namespace App\Observers;

use App\Helpers\CommonHelper;
use App\Models\Category;

class CategoryObserver
{
    /**
     * Handle the Category "created" event.
     */
    public function created(Category $category): void
    {
        CommonHelper::createLog("Creating category: {$category->name}");

    }

    /**
     * Handle the Category "updated" event.
     */
    public function updated(Category $category): void
    {
        CommonHelper::createLog("Updating category: {$category->name}");

    }

    /**
     * Handle the Category "deleted" event.
     */
    public function deleted(Category $category): void
    {
        CommonHelper::createLog("Deleting category: {$category->name}");

    }

    /**
     * Handle the Category "restored" event.
     */
    public function restored(Category $category): void
    {
        //
    }

    /**
     * Handle the Category "force deleted" event.
     */
    public function forceDeleted(Category $category): void
    {
        //
    }
}
