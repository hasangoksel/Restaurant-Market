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
            $table->increments('product_id');
            $table->foreignId('type_id');
            $table->foreignId('category_id');
            $table->string('name');
            $table->string('detail');
            $table->integer('count')->unsigned();
            $table->decimal('price',10,2);
            $table->tinyInteger('discountRate')->unsigned();
            $table->string('image');
            $table->timestamps();

            $table->foreign('typeID')->references('typeID')->on('types');
            $table->foreign('categoryID')->references('categoryID')->on('categories');
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
