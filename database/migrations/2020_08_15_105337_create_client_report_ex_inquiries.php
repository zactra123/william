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
            $table->string('is_dispute')->nullable();
            $table->string('under_dispute')->nullable();
            $table->string('subscriber_id')->nullable();
            $table->string('negative_item')->nullable();
            $table->string('ain')->nullable();
            $table->string('end_user')->nullable();
            $table->string('source_name')->nullable();
            $table->string('source_address_street')->nullable();
            $table->string('source_address_city')->nullable();
            $table->string('source_address_state')->nullable();
            $table->string('source_address_zip')->nullable();
            $table->string('source_address_phone')->nullable();
            $table->string('source_address_phone_type')->nullable();
            $table->text('date_of_inquiry')->nullable();
            $table->string('comment')->nullable();
            $table->string('permissible_purpose')->nullable();
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
