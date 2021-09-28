<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSitesettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sitesettings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('first_slider_image')->nullable();
            $table->text('first_slider_title')->nullable();
            $table->text('first_slider_text')->nullable();
            $table->text('first_slider_button_text')->nullable();
            $table->text('first_slider_button_link')->nullable();
            $table->text('second_slider_image')->nullable();
            $table->text('second_slider_title')->nullable();
            $table->text('second_slider_text')->nullable();
            $table->text('second_slider_button_text')->nullable();
            $table->text('second_slider_button_link')->nullable();
            $table->text('third_slider_image')->nullable();
            $table->text('third_slider_title')->nullable();
            $table->text('third_slider_text')->nullable();
            $table->text('third_slider_button_text')->nullable();
            $table->text('third_slider_button_link')->nullable();
            $table->text('address')->nullable();
            $table->text('phone')->nullable();
            $table->text('email')->nullable();
            $table->text('twitter_link')->nullable();
            $table->text('facebook_link')->nullable();
            $table->text('instagram_link')->nullable();
            $table->text('skype_link')->nullable();
            $table->text('linkedin_link')->nullable();
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
        Schema::dropIfExists('sitesettings');
    }
}
