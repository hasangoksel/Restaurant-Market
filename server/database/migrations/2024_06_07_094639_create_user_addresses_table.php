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
            Schema::create('user_addresses', function (Blueprint $table) {
                $table->increments('user_address_id');
                $table->foreignId('user_id')->constrained()->onDelete('cascade');
                $table->foreignId('address_id')->constrained()->onDelete('cascade');
                $table->timestamps();
            });
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_addresses');
    }
};