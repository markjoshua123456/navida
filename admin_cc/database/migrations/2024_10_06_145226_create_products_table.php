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
            $table->id('products_id');  // Primary key
            $table->unsignedBigInteger('categories_id');  // Foreign key for categories table
            $table->string('product_name');
            $table->integer('product_stocks');
            $table->string('product_status');
            $table->text('product_desc');
            $table->decimal('product_price', 8, 2);
            $table->string('item_code')->nullable();
            $table->string('product_image')->nullable();  // Path to the product image, nullable
            $table->timestamps();

            // Foreign key constraint
            // $table->foreign('categories_id')
            //     ->references('id')
            //     ->on('categories')
            //     ->onDelete('cascade');
            //
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
