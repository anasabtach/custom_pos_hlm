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
            $table->string('remarks', 10000)->nullable()->after('user_permissions');
        });

        Schema::table('brands', function (Blueprint $table) {
            $table->string('remarks', 10000)->nullable()->after('order_by');
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->string('remarks', 10000)->nullable()->after('order_by');
        });

        Schema::table('customers', function (Blueprint $table) {
            $table->string('remarks', 10000)->nullable()->after('status');
        });

        Schema::table('purchases', function (Blueprint $table) {
            $table->string('remarks', 10000)->nullable()->after('date');
        });

        Schema::table('sales', function (Blueprint $table) {
            $table->string('remarks', 10000)->nullable()->after('total');
        });

        Schema::table('suppliers', function (Blueprint $table) {
            $table->string('remarks', 10000)->nullable()->after('note');
        });

        Schema::table('units', function (Blueprint $table) {
            $table->string('remarks', 10000)->nullable()->after('status');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->string('remarks', 10000)->nullable()->after('remember_token');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->string('remarks', 10000)->nullable()->after('expiration');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->dropColumn('remarks');
        });

        Schema::table('brands', function (Blueprint $table) {
            $table->dropColumn('remarks');
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('remarks');
        });

        Schema::table('customers', function (Blueprint $table) {
            $table->dropColumn('remarks');
        });

        Schema::table('purchases', function (Blueprint $table) {
            $table->dropColumn('remarks');
        });

        Schema::table('sales', function (Blueprint $table) {
            $table->dropColumn('remarks');
        });

        Schema::table('suppliers', function (Blueprint $table) {
            $table->dropColumn('remarks');
        });

        Schema::table('units', function (Blueprint $table) {
            $table->dropColumn('remarks');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('remarks');
        });
    }
};
