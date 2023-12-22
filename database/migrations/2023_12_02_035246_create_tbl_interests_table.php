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
        Schema::create('tbl_interests', function (Blueprint $table) {
            $table->increments('interest_id');
            $table->integer('interest_sender_id');
            $table->integer('interest_receiver_id');
            $table->enum('interest_status', ['accept', 'request', "deny"])->default('request');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_interests');
    }
};
