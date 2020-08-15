<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientReportTuAccountsHistories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_report_tu_accounts_histories', function (Blueprint $table) {
            Schema::create('client_report_tu_public_records', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('client_report_tu_account_id');
                $table->foreign('client_report_tu_account_id')->references('id')->on('client_report_tu_accounts');
                $table->string('month')->nullable();
                $table->string('year')->nullable();
                $table->string('value')->nullable();

                $table->timestamps();
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_report_tu_accounts_histories');
    }
}
