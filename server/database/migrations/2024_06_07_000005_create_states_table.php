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
        Schema::create('states', function (Blueprint $table) {
            $table->tinyInteger('state_id')->unsigned()->autoIncrement();
            $table->string('name',30);
            $table->unsignedTinyInteger('language_id');
            $table->timestamps();

            $table->foreign('language_id')->references('language_id')->on('languages');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('states');
    }
};
