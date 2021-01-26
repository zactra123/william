<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('states', function (Blueprint $table) {
            $table->integer('type')->nullable()->after('name')->default(1);
            $table->integer('n_default_date')->nullable()->after('type');
            $table->integer('n_sale_date')->nullable()->after('n_default_date');
            $table->integer('auction_date')->nullable()->after('n_sale_date');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('states', function (Blueprint $table) {
            $table->dropColumn(["type"]);
            $table->dropColumn(["n_default_date"]);
            $table->dropColumn(["n_sale_date"]);
            $table->dropColumn(["auction_date"]);
        });
    }
}
