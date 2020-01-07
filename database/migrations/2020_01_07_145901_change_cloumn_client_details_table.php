<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeCloumnClientDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('ALTER TABLE client_details MODIFY `sex` VARCHAR(191)');
        DB::statement('ALTER TABLE client_details MODIFY `dob` VARCHAR(191)');
        DB::statement('ALTER TABLE client_details MODIFY `ssn` VARCHAR(191)');
        DB::statement('ALTER TABLE client_details MODIFY `phone_number` VARCHAR(191)');
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
