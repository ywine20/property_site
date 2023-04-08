<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRedeemCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('redeem_codes', function (Blueprint $table) {
            $table->id();
            $table->string("random_code");
            $table->string("tier");
            $table->string("project_name");
            $table->string("site_progress");
            $table->string("legal_document");
            $table->integer("site_progress_id");
            $table->integer("legal_document_id");
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
        Schema::dropIfExists('redeem_codes');
    }
}
