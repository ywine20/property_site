<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlbumProgressAllowancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('album_progress_allowances', function (Blueprint $table) {
            $table->id();
            $table->integer("project_id")->nullable();
            $table->string("site_progress")->nullable();
            $table->string("album")->nullable();
            $table->integer("site_progress_id")->nullable();
            $table->integer("album_id")->nullable();
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
        Schema::dropIfExists('album_progress_allowances');
    }
}
