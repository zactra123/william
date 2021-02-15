<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourtJudgesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('court_judges', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('court_id');
            $table->foreign('court_id')->references('id')->on('courts')->onDelete('cascade');
            $table->string("full_name")->nullable();
            $table->string("email")->nullable();
            $table->string("phone_number")->nullable();
            $table->string("room_number")->nullable();
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
        Schema::dropIfExists('court_judges');
    }
}
