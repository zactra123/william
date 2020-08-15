<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientReportExAccounts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_report_ex_accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('client_report_id');
            $table->foreign('client_report_id')->references('id')->on('client_reports');
            $table->string('is_dispute')->nullable();
            $table->string('under_dispute')->nullable();
            $table->string('negative_item')->nullable();
            $table->date('opened_date')->nullable();
            $table->date('report_started_date')->nullable();
            $table->date('status_date')->nullable();
            $table->date('last_reported_date')->nullable();
            $table->string('type')->nullable();
            $table->string('classification')->nullable();
            $table->string('term')->nullable();
            $table->string('monthly_payment')->nullable();
            $table->string('responsibility')->nullable();
            $table->string('credit_limit')->nullable();
            $table->string('original_balance')->nullable();
            $table->string('high_balance')->nullable();
            $table->string('source_name')->nullable();
            $table->string('source_id')->nullable();
            $table->string('source_address_street')->nullable();
            $table->string('source_address_city')->nullable();
            $table->string('source_address_state')->nullable();
            $table->string('source_address_zip')->nullable();
            $table->string('source_address_phone')->nullable();
            $table->string('source_address_phone_type')->nullable();
            $table->string('ain')->nullable();
            $table->string('original_creditor')->nullable();
            $table->string('sold_to')->nullable();
            $table->string('purchased_from')->nullable();
            $table->string('mortgage_id')->nullable();
            $table->string('recent_balance_date')->nullable();
            $table->string('recent_balance_amount')->nullable();
            $table->string('recent_balance_pay_amount')->nullable();
            $table->string('status')->nullable();
            $table->string('statement')->nullable();
            $table->string('reinvestigation')->nullable();
            $table->string('positive')->nullable();
            $table->string('secondary_agency_name')->nullable();
            $table->string('secondary_agency_id')->nullable();
            $table->string('on_record_until')->nullable();
            $table->string('complianceCode')->nullable();
            $table->string('subscriberStatement')->nullable();
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
        Schema::dropIfExists('client_report_ex_accounts');
    }
}
