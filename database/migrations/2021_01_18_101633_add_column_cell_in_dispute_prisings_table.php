<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnCellInDisputePrisingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('disputes_pricings', function (Blueprint $table) {
            $table->float('cell_blocking')->nullable()->after('student_loan_blocking');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dispute_prisings', function (Blueprint $table) {
            $table->dropColumn(["cell_blocking"]);

        });
    }
}
