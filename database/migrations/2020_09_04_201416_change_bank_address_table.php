<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeBankAddressTable extends Migration
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
            $table->dropForeign('bank_addresses_bank_logo_id_foreign');
            $table->dropColumn('bank_logo_id');

            $table->unsignedBigInteger('bank_account_id')->after('id');
            $table->foreign('bank_account_id', 'ba_bank_account_id')->references('id')->on('bank_logos')->onDelete('cascade');
            $table->string('fax_number')->nullable()->after('zip');
            $table->string('phone_number')->nullable()->after('zip');
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
        Schema::create('account_types', function (Blueprint $table) {
            $table->unsignedBigInteger('bank_logo_id');
            $table->foreign('bank_logo_id')->references('id')->on('bank_logos')->onDelete('cascade');

            $table->dropForeign('bank_addresses_bank_logo_id');
            $table->dropColumn('bank_account_id');
            $table->dropColumn('fax_number');
            $table->dropColumn('phone_number');
        });

        Schema::create('bank_phone_numbers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('bank_logo_id');
            $table->foreign('bank_logo_id')->references('id')->on('bank_logos')->onDelete('cascade');
            $table->string('type')->nullable();
            $table->string('number')->nullable();
        });
    }
}
