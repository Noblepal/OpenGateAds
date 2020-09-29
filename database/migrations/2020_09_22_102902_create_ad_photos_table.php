<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad_photos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('ad_id');
            $table->foreign('ad_id')->references('id')->on('ads')->onDelete('cascade');
            $table->string('image_path');
            $table->string('type'); //gallery or main_image
            $table->softDeletes();
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
        Schema::dropIfExists('ad_photos');
    }
}
