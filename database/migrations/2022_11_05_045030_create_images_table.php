<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('small_img1')->nullable();
            $table->string('small_img2')->nullable();
            $table->string('small_img3')->nullable();
            $table->string('small_img4')->nullable();
            $table->string('small_img5')->nullable();
            $table->string('small_img6')->nullable();
            $table->string('small_img7')->nullable();
            $table->string('small_img8')->nullable();
            $table->string('small_img9')->nullable();
            $table->foreignId("project_id")->constraint("projects")->onDelete("cascade");
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
        Schema::dropIfExists('images');
    }
}
