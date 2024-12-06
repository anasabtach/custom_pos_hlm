<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->softDeletes(); // Adds the deleted_at column
        });

        Schema::table('brands', function (Blueprint $table) {
            $table->softDeletes(); // Adds the deleted_at column
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->softDeletes(); // Adds the deleted_at column
        });

        Schema::table('customers', function (Blueprint $table) {
            $table->softDeletes(); // Adds the deleted_at column
        });

        Schema::table('purchases', function (Blueprint $table) {
            $table->softDeletes(); // Adds the deleted_at column
        });

        Schema::table('sales', function (Blueprint $table) {
            $table->softDeletes(); // Adds the deleted_at column
        });

        Schema::table('suppliers', function (Blueprint $table) {
            $table->softDeletes(); // Adds the deleted_at column
        });
        
        Schema::table('units', function (Blueprint $table) {
            $table->softDeletes(); // Adds the deleted_at column
        });

        Schema::table('users', function (Blueprint $table) {
            $table->softDeletes(); // Adds the deleted_at column
        });
        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->softDeletes(); // Adds the deleted_at column
        });

        Schema::table('brands', function (Blueprint $table) {
            $table->softDeletes(); // Adds the deleted_at column
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->softDeletes(); // Adds the deleted_at column
        });

        Schema::table('customers', function (Blueprint $table) {
            $table->softDeletes(); // Adds the deleted_at column
        });

        Schema::table('purchases', function (Blueprint $table) {
            $table->softDeletes(); // Adds the deleted_at column
        });

        Schema::table('sales', function (Blueprint $table) {
            $table->softDeletes(); // Adds the deleted_at column
        });

        Schema::table('suppliers', function (Blueprint $table) {
            $table->softDeletes(); // Adds the deleted_at column
        });
        
        Schema::table('units', function (Blueprint $table) {
            $table->softDeletes(); // Adds the deleted_at column
        });

        Schema::table('users', function (Blueprint $table) {
            $table->softDeletes(); // Adds the deleted_at column
        });    }
};
