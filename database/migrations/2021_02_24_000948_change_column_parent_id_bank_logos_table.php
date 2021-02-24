<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnParentIdBankLogosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('bank_logos', function (Blueprint $table) {
            $table->dropForeign('bank_logos_parent_id_foreign');
            $table->bigInteger('parent_id')->nullable()->unsigned()->change();
            $table->foreign('parent_id')
                ->references('id')->on('bank_logos')
                ->onDelete('set null');

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
            $table->dropForeign(["parent_id"]);
            $table->dropColumn(["parent_id"]);
        });
    }
}
