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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->constrained();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->unsignedInteger('unit_id')->nullable();
            $table->string('name',50)->unique();
            $table->string('sku',50)->unique();
            $table->unsignedFloat('price',10,2);
            $table->unsignedInteger('stock');
            $table->unsignedInteger('stock_alert')->nullable();
            $table->text('description')->nullable();
            $table->enum('has_variation',['1', '0'])->comment('1 means has variation 0 means not');
            $table->enum('status',['1', '0'])->default(0)->comment('1 means active 0 means not active');
            $table->date('expiration')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
