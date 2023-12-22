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
        Schema::create('tbl_employee_profiles', function (Blueprint $table) {
            $table->increments('employee_id');
            $table->string('emp_name');
            $table->string('working_potion');
            $table->string('package_amount');
            $table->string('location');
            $table->string('education');
            $table->string('emp_img');
            $table->longText('description');
            $table->enum('isActive', ['active', 'inactive'])->default('active');
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
        Schema::dropIfExists('tbl_employee_profiles');
    }
};
