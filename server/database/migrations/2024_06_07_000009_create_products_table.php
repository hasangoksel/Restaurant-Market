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
            $table->unsignedTinyInteger('category_id');
            $table->unsignedTinyInteger('type_id');
            $table->string('name');
            $table->string('detail');
            $table->integer('count')->unsigned();
            $table->decimal('price',10,2);
            $table->tinyInteger('discountRate')->unsigned();
            $table->string('image');
            $table->integer('quentitySold');
            $table->timestamps();

            $table->foreign('category_id')->references('category_id')->on('categories');
            $table->foreign('type_id')->references('type_id')->on('types');
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
