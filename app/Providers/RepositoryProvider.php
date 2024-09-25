<?php

namespace App\Providers;

use App\Interfaces\Admin\AdminProfileInterface;
use App\Interfaces\Admin\AuthInterface;
use App\Interfaces\Admin\CategoryInterface;
use App\Repository\Admin\AdminProfileRepository;
use App\Repository\Admin\AuthRepository;
use App\Repository\Admin\CategoryRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AuthInterface::class, AuthRepository::class);
        $this->app->bind(CategoryInterface::class, CategoryRepository::class);
        $this->app->bind(AdminProfileInterface::class, AdminProfileRepository::class);

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
