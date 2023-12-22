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
        Schema::create('partner_preferences', function (Blueprint $table) {
            $table->increments('partner_id');
            $table->integer('tbl_users_id');
            $table->integer('partner_martia_status')->nullable();
            $table->string('partner_weight')->nullable();
            $table->string('partner_hight')->nullable();
            $table->integer('partner_state')->nullable();
            $table->string('partner_city')->nullable();
            $table->string('partner_mother_tongue')->nullable();
            $table->string('partner_job_type')->nullable();
            $table->string('partner_salary')->nullable();
            $table->integer('partner_religion')->nullable();
            $table->integer('partner_cast')->nullable();
            $table->string('partner_color')->nullable();
            $table->string('partner_body_type')->nullable();
            $table->integer('partner_is_handcapped')->nullable();
            $table->integer('partner_family_type')->nullable();
            $table->integer('partner_diet')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partner_preferences');
    }
};
