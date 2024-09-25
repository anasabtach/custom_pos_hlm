<?php

use App\Helpers\Hashid;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\UpdateProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::name('admin.')->group(function(){
    Route::middleware('guest:admin')->group(function(){
        Route::get('/login',[AuthController::class, 'loginForm'])->name('login_form');
        Route::post('/login', [AuthController::class, 'login'])->name('login');
    });
    
    Route::middleware('auth:admin')->group(function(){
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
        //update profile
        Route::controller(UpdateProfileController::class)->group(function(){
            Route::get('/profile', 'profile')->name('profile');
            Route::post('/update-profile', 'updateProfile')->name('update_profile');
        });
        //dashboard routes
        Route::prefix('/dashboard')->name('dashboards.')->controller(DashboardController::class)->group(function(){
            Route::get('/', 'index')->name('index');
        });
        //category rotues
        Route::prefix('/categories')->name('categories.')->controller(CategoryController::class)->group(function(){
            Route::get('/', 'index')->name('index');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{category_id}', 'edit')->name('edit');
            Route::get('/delete/{category_id}', 'delete')->name('delete');
            Route::get('/update-list', 'updateList')->name('update_list');
        });

        //brand rotues
        Route::prefix('/brands')->name('brands.')->controller(BrandController::class)->group(function(){
            Route::get('/', 'index')->name('index');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{brand_id}', 'edit')->name('edit');
            Route::get('/delete/{brand_id}', 'delete')->name('delete');
            Route::get('/update-list', 'updateList')->name('update_list');
        });
        
        //unit rotues
        Route::prefix('/units')->name('units.')->controller(UnitController::class)->group(function(){
            Route::get('/', 'index')->name('index');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{brand_id}', 'edit')->name('edit');
            Route::get('/delete/{brand_id}', 'delete')->name('delete');
            Route::get('/update-list', 'updateList')->name('update_list');
        });

        //product routess
        Route::prefix('/products')->name('products.')->controller(ProductController::class)->group(function(){
            Route::get('/', 'index');
        });
    });
});