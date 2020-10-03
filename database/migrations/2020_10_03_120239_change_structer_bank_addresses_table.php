<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeStructerBankAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Schema::table('bank_addresses', function (Blueprint $table) {

            $table->dropForeign('ba_bank_account_id');
            $table->dropColumn('bank_account_id');

            $table->unsignedBigInteger('bank_logo_id')->after('id');
            $table->foreign('bank_logo_id', 'bank_logo_id')->references('id')->on('bank_logos')->onDelete('cascade');
            $table->unsignedBigInteger('account_type_id')->nullable()->after('bank_logo_id');
            $table->foreign('account_type_id', 'account_type_id')->nullable()->references('id')->on('account_types')->onDelete('cascade');

        });
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        Schema::dropIfExists('bank_phone_numbers');
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
