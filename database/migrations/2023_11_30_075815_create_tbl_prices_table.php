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
        Schema::create('tbl_prices', function (Blueprint $table) {
            $table->increments('price_plan_id');
            $table->integer('tbl_plan_id');
            $table->string('month');
            $table->integer('price');
            $table->integer('view_profile')->nullable();
            $table->longText('price_feature')->nullable();
            $table->enum('price_status', ['active', 'inActive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_prices');
    }
};
