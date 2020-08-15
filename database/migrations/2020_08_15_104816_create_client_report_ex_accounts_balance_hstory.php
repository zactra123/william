<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientReportExAccountsBalanceHstory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_report_ex_accounts_balance_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('client_report_ex_account_id');
            $table->foreign('client_report_ex_account_id', 'ex_acc_id_bh')->references('id')->on('client_report_ex_accounts');
            $table->string('date')->nullable();
            $table->string('amount')->nullable();
            $table->string('date_pr')->nullable();
            $table->string('amount_sch')->nullable();
            $table->string('amount_act')->nullable();
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
        Schema::dropIfExists('client_report_ex_accounts_balance_histories');
    }
}
