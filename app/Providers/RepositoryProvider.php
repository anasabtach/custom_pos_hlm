<?php

namespace App\Providers;

use App\Interfaces\Admin\AdminProfileInterface;
use App\Interfaces\Admin\AuthInterface;
use App\Interfaces\Admin\BrandInterface;
use App\Interfaces\Admin\CategoryInterface;
use App\Interfaces\Admin\CustomerInterface;
use App\Interfaces\Admin\ProductInterface;
use App\Interfaces\Admin\PurchaseInterface;
use App\Interfaces\Admin\SupplierInterface;
use App\Interfaces\Admin\UnitInterface;
use App\Repository\Admin\AdminProfileRepository;
use App\Repository\Admin\AuthRepository;
use App\Repository\Admin\BrandRepository;
use App\Repository\Admin\CategoryRepository;
use App\Repository\Admin\CustomerRepository;
use App\Repository\Admin\ProductRepository;
use App\Repository\Admin\PurchaseRepository;
use App\Repository\Admin\SupplierRepository;
use App\Repository\Admin\UnitRepository;
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
        $this->app->bind(BrandInterface::class, BrandRepository::class);
        $this->app->bind(ProductInterface::class, ProductRepository::class);
        $this->app->bind(UnitInterface::class, UnitRepository::class);
        $this->app->bind(SupplierInterface::class, SupplierRepository::class);
        $this->app->bind(CustomerInterface::class, CustomerRepository::class);
        $this->app->bind(PurchaseInterface::class, PurchaseRepository::class);
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
