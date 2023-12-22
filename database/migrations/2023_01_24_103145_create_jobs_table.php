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
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('job_id');
            $table->integer('job_company_id');
            $table->integer('job_job_title_id');
            $table->integer('job_location_id')->nullable();
            $table->string('job_experience_id')->nullable();
            $table->string('job_skills_id')->nullable();
            $table->string('job_education_id')->nullable();
            $table->string('job_package')->nullable();
            $table->integer('job_type_id')->nullable();
            $table->date('job_expiry_date')->nullable();
            $table->date('job_posting_date')->nullable();
            $table->longText('job_description')->nullable();
            $table->string('job_url')->nullable();
            $table->enum('isJobFeatured', ['featured', 'not_featured'])->nullable();
            $table->enum('isJobActive', ['active', 'inActive'])->default('active');
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
        Schema::dropIfExists('jobs');
    }
};
