<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientReportEqPublicRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_report_eq_public_records', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('client_report_id');
            $table->foreign('client_report_id')->references('id')->on('client_reports');
            $table->string('category_type')->nullable();
            $table->string('reference_number')->nullable();
            $table->string('classification')->nullable();
            $table->date('date_filed')->nullable();
            $table->date('date')->nullable();
            $table->string('status')->nullable();
            $table->string('amount')->nullable();
            $table->string('street')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->string('phone')->nullable();
            $table->string('name')->nullable();
            $table->string('institution_code')->nullable();
            $table->date('date_verified')->nullable();
            $table->string('responsibility')->nullable();
            $table->string('public_record_id')->nullable();
            $table->string('type')->nullable();
            $table->string('asset')->nullable();
            $table->string('court_number')->nullable();
            $table->string('trustee')->nullable();
            $table->string('liability_amount')->nullable();
            $table->string('exempt_amount')->nullable();
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
        Schema::dropIfExists('client_report_eq_public_records');
    }
}
