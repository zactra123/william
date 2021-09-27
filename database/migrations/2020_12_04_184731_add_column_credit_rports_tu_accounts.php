<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnCreditRportsTuAccounts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('client_report_tu_accounts', function (Blueprint $table) {
            $table->json('secondary_agency')->nullable()->after('subscriber_code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('client_report_tu_accounts', function (Blueprint $table) {
            $table->dropColumn(["secondary_agency"]);
        });
    }
}
