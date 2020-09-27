<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperianStatmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_report_ex_statements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('client_report_id');
            $table->foreign('client_report_id')->references('id')->on('client_reports');
            $table->text('statement')->nullable();
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
        Schema::dropIfExists('client_report_ex_statements');
    }
}
