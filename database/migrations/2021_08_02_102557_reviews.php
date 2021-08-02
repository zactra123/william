<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Reviews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('reviews', function (Blueprint $table) {
          $table->increments('id');
          $table->longText('user_id')->nullable();
          $table->longText('name')->nullable();
          $table->longText('email')->nullable();
          $table->longText('rating')->nullable();
          $table->longText('review')->nullable();
          $table->longText('show_home')->always('no');
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
        Schema::dropIfExists('reviews');
    }
}
