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
        Schema::create('trusted_couples', function (Blueprint $table) {
            $table->increments('tc_id');
            $table->string('tc_name');
            $table->string('tc_image');
            $table->string('tc_location');
            $table->string('tc_review');
            $table->enum('is_active', ['Active', 'Inactive'])->default("Active");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trusted_couples');
    }
};
