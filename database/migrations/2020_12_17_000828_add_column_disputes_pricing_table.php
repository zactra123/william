<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnDisputesPricingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::table('disputes_pricings', function (Blueprint $table) {
            $table->float('unknown')->nullable()->after('truck_load_ca');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('disputes_pricings', function (Blueprint $table) {
            $table->dropColumn(["unknown"]);
        });
    }
}
