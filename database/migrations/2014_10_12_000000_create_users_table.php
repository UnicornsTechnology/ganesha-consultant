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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->string('mobile')->unique()->nullable();
            $table->integer('state')->nullable();
            $table->string('pin_code')->nullable();
            $table->string('district')->nullable();
            $table->string('taluka')->nullable();
            $table->string('village')->nullable();
            $table->integer('city')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('birth_time')->nullable();
            $table->string('birth_place')->nullable();
            $table->string('education')->nullable();
            $table->integer('gender')->nullable();
            $table->integer('marital_status')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('father_full_name')->nullable();
            $table->string('mother_full_name')->nullable();
            $table->string('father_occupation')->nullable();
            $table->string('mother_occupation')->nullable();
            $table->integer('job_type')->nullable();
            $table->integer('age')->nullable();
            $table->integer('mother_tongue')->nullable();
            $table->string('company_name')->nullable();
            $table->string('salary')->nullable();
            $table->integer('blood_group')->nullable();
            $table->integer('color')->nullable();
            $table->integer('body_type')->nullable();
            $table->integer('caste')->nullable();
            $table->integer('subcaste')->nullable();
            $table->integer('religion')->nullable();
            $table->integer('devak')->nullable();
            $table->integer('nakshatra')->nullable();
            $table->integer('charan')->nullable();
            $table->integer('gan')->nullable();
            $table->integer('raas')->nullable();
            $table->integer('nad')->nullable();
            $table->integer('varg')->nullable();
            $table->integer('kul_devak')->nullable();
            $table->integer('brothers')->nullable();
            $table->integer('sisters')->nullable();
            $table->string('mama')->nullable();
            $table->string('main_profile_pic')->nullable();
            $table->integer('profile_created_by')->nullable();
            $table->string('sub_pic_1')->nullable();
            $table->string('sub_pic_2')->nullable();
            $table->string('sub_pic_3')->nullable();
            $table->string('sub_pic_4')->nullable();
            $table->string('relatives')->nullable();
            $table->integer('diet')->nullable();
            $table->integer('smoking_habits')->nullable();
            $table->integer('family_type')->nullable();
            $table->integer('drinking_habits')->nullable();
            $table->text('property_details')->nullable();
            $table->string('adhar')->nullable();
            $table->string('pan_card')->nullable();
            $table->string('driving_license')->nullable();
            $table->integer('is_handicapped')->nullable();
            $table->text('hobbies')->nullable();
            $table->string('facebook')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->integer('view_profile_limit')->default(0);
            $table->integer('otp')->nullable();
            $table->integer('user_percentages')->nullable();
            $table->enum('user_type', ['user', 'admin'])->default('user');
            $table->enum('user_status', ['Activated', 'Deactivated'])->default('Activated');
            $table->enum('lock_status', ['Locked', 'Unlocked'])->default('Unlocked');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
