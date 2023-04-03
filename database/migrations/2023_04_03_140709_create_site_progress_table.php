<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteProgressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_progress', function (Blueprint $table) {
            $table->id();
            $table->longText("description")->nullable();
            $table->integer("project_id")->nullable();
            $table->integer("site_gallery_id")->nullable();
            $table->string("cover_image")->nullable();
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
        Schema::dropIfExists('site_progress');
    }
}
