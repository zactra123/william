<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientReportTuPublicRecords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_report_tu_public_records', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('client_report_id');
            $table->foreign('client_report_id')->references('id')->on('client_reports');
            $table->string('suppression_indicator')->nullable();
            $table->string('name')->nullable();
            $table->string('public_record_handle')->nullable();
            $table->string('address')->nullable();
            $table->string('street')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->string('docket_number')->nullable();
            $table->string('phone')->nullable();
            $table->date('date_effective')->nullable();
            $table->string('liabilities')->nullable();
            $table->string('date_effective_label')->nullable();
            $table->date('date_filed')->nullable();
            $table->date('date_paid')->nullable();
            $table->string('type')->nullable();
            $table->string('court_type')->nullable();
            $table->string('court_type_description')->nullable();
            $table->string('responsibility')->nullable();
            $table->string('assets')->nullable();
            $table->string('amount')->nullable();
            $table->string('plaintiff')->nullable();
            $table->string('plaintiff_attorney')->nullable();
            $table->date('estimated_deletion_date')->nullable();
            $table->string('how_filed')->nullable();
            $table->string('status')->nullable();
            $table->string('on_record_until')->nullable();
            $table->string('assets_amount')->nullable();
            $table->string('exempt_amount')->nullable();
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('client_report_tu_public_records');
    }
}
