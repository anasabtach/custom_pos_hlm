<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->insert([
            'first_name'    => 'Admin',
            'last_name'     => 'Admin',
            'email'         => 'admin@admin.com',
            'password'      => Hash::make('123456'),
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);
    }
}
