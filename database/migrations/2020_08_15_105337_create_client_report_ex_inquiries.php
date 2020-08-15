<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientReportExInquiries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_report_ex_inquiries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('client_report_id');
            $table->foreign('client_report_id')->references('id')->on('client_reports');
            $table->string('current')->nullable();
            $table->string('is_dispute')->nullable();
            $table->string('under_dispute')->nullable();
            $table->string('negative_item')->nullable();
            $table->date('date_filed')->nullable();
            $table->date('date_resolved')->nullable();
            $table->string('responsibility')->nullable();
            $table->string('claim_amount')->nullable();
            $table->string('liability_amount')->nullable();
            $table->string('source_name')->nullable();
            $table->string('source_id')->nullable();
            $table->string('location_number')->nullable();
            $table->string('source_address_street')->nullable();
            $table->string('source_address_city')->nullable();
            $table->string('source_address_state')->nullable();
            $table->string('source_address_zip')->nullable();
            $table->string('source_address_phone')->nullable();
            $table->string('source_address_phone_type')->nullable();
            $table->string('ain')->nullable();
            $table->string('your_statement')->nullable();
            $table->string('reinvestigation')->nullable();
            $table->string('plaintiff')->nullable();
            $table->string('status')->nullable();
            $table->string('on_record_until')->nullable();
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
        Schema::dropIfExists('client_report_ex_inquiries');
    }
}
