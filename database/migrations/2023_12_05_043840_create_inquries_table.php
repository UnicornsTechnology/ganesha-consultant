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
        Schema::create('inquries', function (Blueprint $table) {
            $table->increments('inquriy_id');
            $table->string('inquriy_name');
            $table->string('inquriy_email');
            $table->string('inquriy_phone');
            $table->text('inquriy_massage');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inquries');
    }
};
