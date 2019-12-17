<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credit_reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('attachment_id');
            $table->foreign('attachment_id')->references('id')->on('client_attachment');
            $table->date('date_of_reported');
            $table->string('account_name');
            $table->string('account_number');
            $table->string('original_creditor');
            $table->string('company_sold');
            $table->string('account_type');
            $table->string('account_status');
            $table->date('date_opened');
            $table->string('payment_status');
            $table->string('status_updated');
            $table->string('balance');
            $table->date('balance_updated');
            $table->string('original_balance');
            $table->string('credit_limit');
            $table->string('monthly_payment');
            $table->string('past_due_amount');
            $table->string('highest_balance');
            $table->string('terms');
            $table->string('responsibility');
            $table->string('your_statement');
            $table->string('comments');
            $table->text('contact_information');
            $table->date('close_date');
            $table->string('worst_payment_status');
            $table->text('date_lates');
            $table->text('payment_history');

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
        Schema::dropIfExists('credit_reports');
    }
}
