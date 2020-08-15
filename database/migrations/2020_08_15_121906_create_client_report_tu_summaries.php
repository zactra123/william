<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientReportTuSummaries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_ report_tu_summaries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('client_report_id');
            $table->foreign('client_report_id')->references('id')->on('client_reports');
            $table->string('open_accounts')->nullable();
            $table->string('total_balances')->nullable();
            $table->string('close_accounts')->nullable();
            $table->string('total_monthly_payment')->nullable();
            $table->string('delinquent_account')->nullable();
            $table->string('derogatory_account')->nullable();
            $table->string('public_records')->nullable();
            $table->string('inquiry_summary')->nullable();
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
        Schema::dropIfExists('client_report_tu_summaries');
    }
}
