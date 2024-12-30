<?php

use App\Helpers\Hashid;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\CommonController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LogController;
use App\Http\Controllers\Admin\PosController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PurchaseController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SaleController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\SupplierController;
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

        //colors rotues
        Route::prefix('/colors')->name('colors.')->controller(ColorController::class)->group(function(){
            Route::get('/', 'index')->name('index');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{color_id}', 'edit')->name('edit');
            Route::get('/delete/{color_id}', 'delete')->name('delete');
            Route::get('/update-list', 'updateList')->name('update_list');
        });
        
        //unit rotues
        Route::prefix('/units')->name('units.')->controller(UnitController::class)->group(function(){
            Route::get('/', 'index')->name('index');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{unit_id}', 'edit')->name('edit');
            Route::get('/delete/{unit_id}', 'delete')->name('delete');
            Route::get('/update-list', 'updateList')->name('update_list');
        });

        //supplier rotues
        Route::prefix('/suppliers')->name('suppliers.')->controller(SupplierController::class)->group(function(){
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{supplier_id}', 'edit')->name('edit');
            Route::get('/delete/{supplier_id}', 'delete')->name('delete');
            Route::get('/update-list', 'updateList')->name('update_list');
            Route::get('/delete-trx-documents/{supplier_id}/{document_id}', 'deleteTrxDocuments')->name('delete_trx_document');
        });

        //customer rotues
        Route::prefix('/customers')->name('customers.')->controller(CustomerController::class)->group(function(){
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{customer_id}', 'edit')->name('edit');
            Route::get('/delete/{customer_id}', 'delete')->name('delete');
            Route::get('/update-list', 'updateList')->name('update_list');
        });

        //product routess
        Route::prefix('/products')->name('products.')->controller(ProductController::class)->group(function(){
            Route::get('/', 'index')->name('index');
            Route::get('/add', 'add')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{product_id}', 'edit')->name('edit');
            Route::get('/delete/{product_id}', 'delete')->name('delete');
            Route::get('/search', 'searchProducts')->name('search');
            Route::get('/product-variation-row', 'productAndVariationRow')->name('product_and_variation_row');
            Route::get('/deleted-products', 'deletedProducts')->name('deleted_products');
        }); 

        Route::prefix('/purchases')->name('purchases.')->controller(PurchaseController::class)->group(function(){
            Route::get('/', 'index')->name('index');
            Route::get('/add', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/details/{purchase_id}', 'details')->name('details');
            Route::get('/edit/{purchase_id}', 'edit')->name('edit');
            Route::get('/delete/{purchase_id}', 'delete')->name('delete');
        });

        Route::prefix('/pos')->name('pos.')->controller(PosController::class)->group(function(){
            Route::get('/', 'index')->name('index');
            Route::get('/bill/{sale_id}', 'generateBill')->name('bill');
        });

        Route::prefix('sale')->name('sales.')->controller(SaleController::class)->group(function(){
            Route::get('/', 'index')->name('index');
            Route::get('/details/{id}', 'details')->name('details');
        });

        //role routes
        Route::prefix('roles')->name('roles.')->controller(RoleController::class)->group(function(){
            Route::get('/', 'index')->name('index');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::get('/delete/{id}', 'delete')->name('delete');
        });
        //staff routes
        Route::prefix('staff')->name('staffs.')->controller(StaffController::class)->group(function(){
            Route::get('/', 'index')->name('index');
            Route::get('/add', 'add')->name('add');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::get('/delete/{id}', 'delete')->name('delete');
            Route::get('/update-status/{id}/{status}', 'updateStatus')->name('update_status');
            Route::get('/resend-credentials-email/{user_id}', 'resendCredentialsEmail')->name('resend_credentials_email');
        });

        //log routes
        Route::prefix('logs')->name('logs.')->controller(LogController::class)->group(function(){
            Route::get('/', 'index')->name('index');
        });
    });

    //commonr routes
    Route::prefix('common')->name('common.')->controller(CommonController::class)->group(function(){
        Route::get('/update-status/{table_name}/{column_name}/{id}/{value}','updateStatus')->name('update_status');
    });
});