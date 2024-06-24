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
        Schema::create('branch_states', function (Blueprint $table) {
            $table->tinyInteger('branch_state_id')->unsigned()->autoIncrement();
            $table->string('name',30);
            $table->unsignedTinyInteger('language_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branch_states');
    }
};
