<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientReportEqAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_report_eq_accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('client_report_id');
            $table->foreign('client_report_id')->references('id')->on('client_reports');
            $table->string('type')->nullable();
            $table->string('account_id')->nullable();
            $table->string('account_number')->nullable();
            $table->string('account_standing')->nullable();
            $table->string('account_status')->nullable();
            $table->string('account_title')->nullable();
            $table->string('account_type')->nullable();
            $table->string('actual_payment_amount')->nullable();
            $table->string('amount_past_due')->nullable();
            $table->string('balance')->nullable();
            $table->string('balance_remain_percent')->nullable();
            $table->string('category_type')->nullable();
            $table->string('current_balance')->nullable();
            $table->date('date_closed')->nullable();
            $table->date('date_last_payment')->nullable();
            $table->date('date_opened')->nullable();
            $table->date('date_reported')->nullable();
            $table->string('high_balance')->nullable();
            $table->string('industry_code')->nullable();
            $table->string('street')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('is_open')->nullable();
            $table->string('last_payment')->nullable();
            $table->string('late_30_count')->nullable();
            $table->string('late_60_count')->nullable();
            $table->string('late_90_count')->nullable();
            $table->string('limit')->nullable();
            $table->string('monthly_payment')->nullable();
            $table->string('original_creditor')->nullable();
            $table->string('new_account_label')->nullable();
            $table->string('current_payment_status')->nullable();
            $table->date('start_date')->nullable();
            $table->string('worst_payment_status')->nullable();
            $table->string('perm_por_item_id')->nullable();
            $table->string('por_item_id')->nullable();
            $table->string('portfolio_type')->nullable();
            $table->text('remarks')->nullable();
            $table->string('report_id')->nullable();
            $table->string('responsibility')->nullable();
            $table->string('tradeline_id')->nullable();
            $table->string('utilization')->nullable();
            $table->string('worst_pay_status')->nullable();
            $table->string('has_limit')->nullable();
            $table->string('utilization_percentage')->nullable();
            $table->string('term_month')->nullable();
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
        Schema::dropIfExists('client_report_eq_accounts');
    }
}
