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
        Schema::create('detailed_profiles', function (Blueprint $table) {
            $table->increments("dp_id");
            $table->integer("dp_user_table_id");
            $table->string("dp_firstname")->nullable();
            $table->string("dp_middlename")->nullable();
            $table->string("dp_lastname")->nullable();
            $table->string("dp_email")->nullable();
            $table->string("dp_email_alt")->nullable();
            $table->string("dp_profile_image")->nullable();
            $table->string("dp_mobile_number")->nullable();
            $table->string("dp_mobile_number_alt")->nullable();
            $table->string("dp_website")->nullable();
            $table->string("dp_current_salary")->nullable();
            $table->string("dp_expected_salary")->nullable();
            $table->string("dp_experience")->nullable();
            $table->string("dp_age")->nullable();
            $table->string("dp_education")->nullable();
            $table->string("dp_languages")->nullable();
            $table->longText("dp_description")->nullable();
            $table->string("dp_facebook_url")->nullable();
            $table->string("dp_github_url")->nullable();
            $table->string("dp_linkedin_url")->nullable();
            $table->string("dp_country")->nullable();
            // foo
            $table->string("dp_state")->nullable();
            $table->string("dp_district")->nullable();
            $table->string("dp_taluka")->nullable();
            $table->string("dp_city_village")->nullable();
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
        Schema::dropIfExists('detailed_profiles');
    }
};
