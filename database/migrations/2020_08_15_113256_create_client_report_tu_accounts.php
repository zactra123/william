<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientReportTuAccounts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_report_tu_accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('client_report_id');
            $table->foreign('client_report_id')->references('id')->on('client_reports');
            $table->string('type')->nullable();
            $table->string('sub_type')->nullable();
            $table->string('suppression_flag')->nullable();
            $table->string('adverse_flag')->nullable();
            $table->string('suppression_indicator')->nullable();
            $table->string('account_name')->nullable();
            $table->string('m_account_name')->nullable();
            $table->string('account_handle')->nullable();
            $table->string('address')->nullable();
            $table->string('street')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->string('phone')->nullable();
            $table->string('account_number')->nullable();
            $table->string('payment_frequency')->nullable();
            $table->string('payment_schedule_month_count')->nullable();
            $table->string('scheduled_monthly_payment')->nullable();
            $table->date('date_opened')->nullable();
            $table->date('date_placed_for_collection')->nullable();
            $table->string('account_type')->nullable();
            $table->string('responsibility')->nullable();
            $table->string('account_type_description')->nullable();
            $table->string('loan_type')->nullable();
            $table->string('balance')->nullable();
            $table->string('date_effective_label')->nullable();
            $table->date('date_effective')->nullable();
            $table->date('date_updated')->nullable();
            $table->string('last_payment_amount')->nullable();
            $table->string('high_balance')->nullable();
            $table->string('original_amount')->nullable();
            $table->string('original_charge_off')->nullable();
            $table->string('original_creditor')->nullable();
            $table->string('credit_limit')->nullable();
            $table->string('past_due')->nullable();
            $table->string('pay_status')->nullable();
            $table->text('terms')->nullable();
            $table->date('date_closed')->nullable();
            $table->date('date_paid')->nullable();
            $table->date('date_paid_out')->nullable();
            $table->string('max_delinquency')->nullable();
            $table->string('hist_high_credit_stmt')->nullable();
            $table->string('hist_credit_limit_stmt')->nullable();
            $table->string('special_payment')->nullable();
            $table->string('mortgage_info')->nullable();
            $table->string('account_sale_info')->nullable();
            $table->date('estimated_deletion_date')->nullable();
            $table->date('last_payment_date')->nullable();
            $table->date('account_history_start_date')->nullable();
            $table->text('hist_balance_list')->nullable();
            $table->text('hist_payment_amt_list')->nullable();
            $table->text('hist_payment_due_list')->nullable();
            $table->text('hist_past_due_list')->nullable();
            $table->text('hist_credit_limit_list')->nullable();
            $table->text('hist_high_credit_list')->nullable();
            $table->text('hist_remark_list')->nullable();
            $table->text('remark')->nullable();
            $table->text('rating')->nullable();
            $table->string('current_balance')->nullable();
            $table->date('date_reported')->nullable();
            $table->date('date_account_status')->nullable();
            $table->string('account_condition')->nullable();
            $table->string('late_30_count')->nullable();
            $table->string('late_60_count')->nullable();
            $table->string('late_90_count')->nullable();
            $table->string('worst_pay_status')->nullable();
            $table->string('m_pay_status')->nullable();
            $table->string('oldest_year')->nullable();
            $table->string('subscriber_code')->nullable();
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
        Schema::dropIfExists('client_report_tu_accounts');
    }
}
