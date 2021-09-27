<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUploadClientDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upload_client_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('first_name')->default(null);
            $table->string('last_name')->default(null);
            $table->enum('sex', ['M', 'F', 'O'])->default('M');
            $table->date('dob')->default(null);
            $table->string('ssn')->default(null);
            $table->string('state')->default(null);
            $table->string('city')->default(null);
            $table->string('address')->default(null);
            $table->string('zip')->default(null);
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
        Schema::dropIfExists('upload_client_details');
    }
}
