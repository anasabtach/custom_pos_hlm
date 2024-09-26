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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->foreignId('admin_id')->constrained('admins');
            $table->string('name',50)->unique();
            $table->string('slug',70);
            $table->enum('status',['1','0'])->default('1')->comment('1 means category is active and 0 means deactive');
            $table->unsignedBigInteger('order_by')->default(0);
            $table->timestamps();
            $table->index('parent_id');
            $table->foreign('parent_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
