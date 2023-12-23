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
        Schema::create('job_seekers', function (Blueprint $table) {
            $table->increments('job_seeker_id');
            $table->string('name');
            $table->string('email');
            $table->string('mobile_number');
            $table->string('whatsapp_number');
            $table->date('date_of_birth');
            $table->string('industry');
            $table->string('job_title');
            $table->string('total_experience');
            $table->string('highest_qualification');
            $table->string('current_salary');
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('complete_address');
            $table->string('upload_resume');
            $table->string('upload_aadhar');
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
        Schema::dropIfExists('job_seekers');
    }
};
