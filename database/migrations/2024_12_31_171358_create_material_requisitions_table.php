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
        Schema::create('material_requisitions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->constrained('admins')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->foreignId('supplier_id')->constrained('suppliers')->onDelete('cascade');
            $table->foreignId('brand_id')->constrained('brands')->onDelete('cascade');
            $table->foreignId('unit_id')->constrained('units')->onDelete('cascade');
            $table->string('reference_no', 100)->unique();
            $table->enum('temperature_control', [1,0]);
            $table->string('color',100)->nullable();
            $table->unsignedBigInteger('quantity');
            $table->unsignedBigInteger('price');
            $table->string('sku',100)->nullable();
            $table->text('payment_terms', 6500);
            $table->string('payment_type', 100);
            $table->text('remarks');
            $table->enum('status', ['pending', 'approve', 'reject'])->default('pending');
            $table->text('status_remarks', 65000)->nullable();
            $table->timestamp('status_update_date')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('material_requisitions');
    }
};
