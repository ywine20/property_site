<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('project_name');
            $table->string('site_progress_id')->nullable();
            $table->string('legal_document_id')->nullable();
            $table->longText('description');
            $table->text('cover');
            $table->text('three_sixty_image')->nullable();
            $table->text('priceImg')->nullable();
            $table->string('lower_price');
            $table->string('upper_price');
            $table->integer('layer');
            $table->integer('squre_feet');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('township_id');
            $table->unsignedBigInteger('city_id');
            $table->longText('gmlink');
            $table->string('progress');
            $table->string('hou_no');
            $table->string('street');
            $table->string('ward');
            $table->integer('viewer')->default(0);
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
        Schema::dropIfExists('projects');
    }
}
