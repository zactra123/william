<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnClientDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('client_details', function (Blueprint $table) {
            $table->string('phone_number');
            $table->string('business_name')->default(null);
            $table->string('referred_by')->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('client_details', function(Blueprint $table) {
            $table->dropColumn('phone_number');
            $table->dropColumn('business_name');
            $table->dropColumn('referred_by');
        });
    }






}
