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
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('order_id');
            $table->string('sCartNumber',10);
            $table->unsignedInteger('user_address_id');
            $table->unsignedInteger('user_id');
            $table->unsignedTinyInteger('branch_id');
            $table->string('estimatedDeliveryTime',30);
            $table->unsignedTinyInteger('state_id');
            $table->decimal('handling_fee',10,2);
            $table->decimal('price',10,2);
            $table->timestamps();   

            $table->foreign('user_address_id')->references('user_address_id')->on('user_addresses');
            $table->foreign('state_id')->references('state_id')->on('states');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('branch_id')->references('branch_id')->on('branches');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
