<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateColumnNulableBankAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('bank_addresses', function (Blueprint $table) {
            $table->dropForeign('bank_logo_id');
            $table->unsignedBigInteger('bank_logo_id')->nullable()->change();
            $table->foreign('bank_logo_id', 'bank_logo_id')->references('id')->on('bank_logos')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
