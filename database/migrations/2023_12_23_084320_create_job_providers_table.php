<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_providers', function (Blueprint $table) {
            $table->Increments('job_provider_id');
            $table->string('owner_name');
            $table->string('job_role');
            $table->string('job_category');
            $table->string('institute_name');
            $table->string('qualification_needed');
            $table->string('experience_needed');
            $table->integer('monthly_salary');
            $table->string('selection_process');
            $table->string('job_location');
            $table->string('mobile_number');
            $table->text('requirement');
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_providers');
    }
};
