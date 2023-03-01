<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id')->nullable();
            $table->string('url')->nullable();
            $table->string('ip_address',45)->nullable();
            $table->string("session_id");
            $table->text('user_agent')->nullable();
            $table->timestamp('visited_date')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->text('pay_load')->nullable();
            $table->integer('last_activity')->nullable();
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
        Schema::dropIfExists('visitors');
    }
}
