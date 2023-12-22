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
        Schema::create('tbl_membership_plans', function (Blueprint $table) {
            $table->increments('membership_plan_id');
            $table->string('plan_name');
            $table->string('plan_massage');
            $table->enum('plan_status', ['active', 'inActive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_membership_plans');
    }
};
