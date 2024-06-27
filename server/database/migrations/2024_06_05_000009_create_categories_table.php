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
            $table->tinyIncrements('category_id');
            $table->unsignedTinyInteger('type_id');
            $table->string('category',30);
            $table->unsignedTinyInteger('language_id');
            $table->timestamps();

            $table->foreign('type_id')->references('type_id')->on('types');
            $table->foreign('language_id')->references('language_id')->on('languages');
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
