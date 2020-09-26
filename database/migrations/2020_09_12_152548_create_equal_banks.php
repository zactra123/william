<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEqualBanks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equal_banks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('bank_logo_id');
            $table->foreign('bank_logo_id')->references('id')->on('bank_logos')->onDelete('cascade');
            $table->string("name");
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
        Schema::dropIfExists('equal_banks');
    }
}
