<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToBankLogosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bank_logos', function (Blueprint $table) {
            $table->dropColumn('type');
        });
        Schema::table('bank_logos', function (Blueprint $table) {
            $table->integer('type')->default(1)->after("name");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bank_logos', function (Blueprint $table) {
            $table->string('type')->default(1)->change();
        });
    }
}
