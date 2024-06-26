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
        Schema::create('branch_messages', function (Blueprint $table) {
            $table->increments('branch_message_id');
            $table->unsignedTinyInteger('branch_id');
            $table->string('message');
            $table->timestamps();

            $table->foreign('branch_id')->references('branch_id')->on('branches');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branch_messages');
    }
};
