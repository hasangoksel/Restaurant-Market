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
        Schema::create('user_s_carts', function (Blueprint $table) {
            $table->increments('user_s_cart_id');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('sCartNumber',10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_s_carts');
    }
};
