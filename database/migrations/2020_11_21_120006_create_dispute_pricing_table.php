<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisputePricingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disputes_pricings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->float('inquiries')->nullable();
            $table->float('personal_info')->nullable();
            $table->float('fraud_alerts')->nullable();
            $table->float('cc_accnt_bloking')->nullable();
            $table->float('auto_blocking')->nullable();
            $table->float('mortgage_blocking')->nullable();
            $table->float('p_loan_blocking')->nullable();
            $table->float('student_loan_blocking')->nullable();
            $table->float('cc_late')->nullable();
            $table->float('auto_late')->nullable();
            $table->float('mortgage_late')->nullable();
            $table->float('student_loan_late')->nullable();
            $table->float('student_loan_charged_off')->nullable();
            $table->float('cc_charged_off')->nullable();
            $table->float('auto_charged_off')->nullable();
            $table->float('auto_repo')->nullable();
            $table->float('auto_early_termination')->nullable();
            $table->float('settled')->nullable();
            $table->float('redeemed_repo')->nullable();
            $table->float('truck_trailer_neg')->nullable();
            $table->float('mortgage_foreclosure')->nullable();
            $table->float('mortgage_short_sale')->nullable();
            $table->float('loan_modified')->nullable();
            $table->float('time_share_neg')->nullable();
            $table->float('bankruptcies')->nullable();
            $table->float('child_support')->nullable();
            $table->float('med_ca')->nullable();
            $table->float('cc_ca')->nullable();
            $table->float('auto_ca')->nullable();
            $table->float('utility_ca')->nullable();
            $table->float('cellphone_ca')->nullable();
            $table->float('mca_ca')->nullable();
            $table->float('misc_ca')->nullable();
            $table->float('auto_ins_ca')->nullable();
            $table->float('jewelery_ca')->nullable();
            $table->float('lease_agreement')->nullable();
            $table->float('pest_ca')->nullable();
            $table->float('deposit_accnt_ca')->nullable();
            $table->float('check_cashing_ca')->nullable();
            $table->float('law_firm_ca')->nullable();
            $table->float('truck_load_ca')->nullable();
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
        Schema::dropIfExists('disputes_pricings');
    }
}
