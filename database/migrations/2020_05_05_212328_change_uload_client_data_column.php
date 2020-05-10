<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeUloadClientDataColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("alter table upload_client_details modify sex enum('M', 'F', 'O') default NULL null;");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("alter table upload_client_details modify sex enum('M', 'F', 'O') default 'M';");
    }
}
