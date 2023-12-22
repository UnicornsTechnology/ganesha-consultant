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
        Schema::create('whats_app_templates', function (Blueprint $table) {
            $table->increments("wt_id");
            $table->string("wt_template_name");
            $table->longText("wt_image_url");
            $table->string("wt_template_language");
            $table->string("wt_file_name");
            $table->enum("wt_is_active",['active','inactive'])->default('active');
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
        Schema::dropIfExists('whats_app_templates');
    }
};
