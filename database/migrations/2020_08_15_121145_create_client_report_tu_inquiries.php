<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientReportTuInquiries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_report_tu_inquiries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('client_report_id');
            $table->foreign('client_report_id')->references('id')->on('client_reports');
            $table->string('inquiry_type')->nullable();
            $table->string('inquiry_id')->nullable();
            $table->string('industry_code')->nullable();
            $table->string('member_code')->nullable();
            $table->string('description')->nullable();
            $table->string('owner')->nullable();
            $table->date('date_of_inquiry')->nullable();
            $table->string('permissible_purpose')->nullable();
            $table->string('subscriber_name')->nullable();
            $table->string('requestor_name')->nullable();
            $table->string('subscriber_type')->nullable();
            $table->date('date')->nullable();
            $table->date('requested_on_dates')->nullable();
            $table->date('requested_dates')->nullable();
            $table->string('inquiry_dates')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->string('phone')->nullable();
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
        Schema::dropIfExists('client_report_tu_inquiries');
    }
}
