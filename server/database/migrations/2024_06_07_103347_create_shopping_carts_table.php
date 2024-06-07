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
        Schema::create('shopping_carts', function (Blueprint $table) {
            $table->bigIncrements('shopping_cart_id');
            $table->foreignId('product_id');
            $table->string('sCartNumber',10);
            $table->string('detail');
            $table->integer('count')->unsigned();
            $table->decimal('price',10,2);
            $table->timestamps();

            $table->foreign('productID')->references('productID')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shopping_carts');
    }
};
