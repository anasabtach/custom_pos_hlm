<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('permissions')->insert([
            [
                'name'  => 'view-category',
                'slug'  => 'view-category'
            ],
            [
                'name'  => 'add-category',
                'slug'  => 'add-category'
            ],
            [
                'name'  => 'edit-category',
                'slug'  => 'edit-category'
            ],
            [
                'name'  => 'delete-category',
                'slug'  => 'delete-category'
            ],
            [
                'name'  => 'view-brand',
                'slug'  => 'view-brand'
            ],
            [
                'name'  => 'add-brand',
                'slug'  => 'add-brand'
            ],
            [
                'name'  => 'edit-brand',
                'slug'  => 'edit-brand'
            ],
            [
                'name'  => 'delete-brand',
                'slug'  => 'delete-brand'
            ],
            [
                'name'  => 'view-supplier',
                'slug'  => 'view-supplier'
            ],
            [
                'name'  => 'add-supplier',
                'slug'  => 'add-supplier'
            ],
            [
                'name'  => 'edit-supplier',
                'slug'  => 'edit-supplier'
            ],
            [
                'name'  => 'delete-supplier',
                'slug'  => 'delete-supplier'
            ],
            [
                'name'  => 'view-customer',
                'slug'  => 'view-customer'
            ],
            [
                'name'  => 'add-customer',
                'slug'  => 'add-customer'
            ],
            [
                'name'  => 'edit-customer',
                'slug'  => 'edit-customer'
            ],
            [
                'name'  => 'delete-customer',
                'slug'  => 'delete-customer'
            ],
            [
                'name'  => 'view-product',
                'slug'  => 'view-product'
            ],
            [
                'name'  => 'add-product',
                'slug'  => 'add-product'
            ],
            [
                'name'  => 'edit-product',
                'slug'  => 'edit-product'
            ],
            [
                'name'  => 'delete-product',
                'slug'  => 'delete-product'
            ],
            [
                'name'  => 'view-purchase',
                'slug'  => 'view-purchase'
            ],
            [
                'name'  => 'add-purchase',
                'slug'  => 'add-purchase'
            ],
            [
                'name'  => 'edit-purchase',
                'slug'  => 'edit-purchase'
            ],
            [
                'name'  => 'delete-purchase',
                'slug'  => 'delete-purchase'
            ],
            [
                'name'  => 'view-sale',
                'slug'  => 'view-sale'
            ],
            [
                'name'  => 'add-sale',
                'slug'  => 'add-sale'
            ],
            [
                'name'  => 'edit-sale',
                'slug'  => 'edit-sale'
            ],
            [
                'name'  => 'delete-sale',
                'slug'  => 'delete-sale'
            ],
            [
                'name'  => 'view-role',
                'slug'  => 'view-role'
            ],
            [
                'name'  => 'add-role',
                'slug'  => 'add-role'
            ],
            [
                'name'  => 'edit-role',
                'slug'  => 'edit-role'
            ],
            [
                'name'  => 'delete-role',
                'slug'  => 'delete-role'
            ],
            [
                'name'  => 'view-staff',
                'slug'  => 'view-staff'
            ],
            [
                'name'  => 'add-staff',
                'slug'  => 'add-staff'
            ],
            [
                'name'  => 'edit-staff',
                'slug'  => 'edit-staff'
            ],
            [
                'name'  => 'delete-staff',
                'slug'  => 'delete-staff'
            ],
            [
                'name'  => 'view-pos',
                'slug'  => 'view-pos'
            ],
            [
                'name'  => 'add-pos',
                'slug'  => 'add-pos'
            ],
            [
                'name'  => 'edit-pos',
                'slug'  => 'edit-pos'
            ],
            [
                'name'  => 'delete-pos',
                'slug'  => 'delete-pos'
            ],
            [
                'name'  => 'view-unit',
                'slug'  => 'view-unit'
            ],
            [
                'name'  => 'add-unit',
                'slug'  => 'add-unit'
            ],
            [
                'name'  => 'edit-unit',
                'slug'  => 'edit-unit'
            ],
            [
                'name'  => 'delete-unit',
                'slug'  => 'delete-unit'
            ],
        ]);
    }
}
