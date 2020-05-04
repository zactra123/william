<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnCredentials extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('credentials', function($table)
        {
            $table->string('ck_login')->nullable()->change();
            $table->string('ck_password')->nullable()->change();
            $table->string('ex_login')->nullable()->change();
            $table->string('ex_password')->nullable()->change();
            $table->string('tu_login')->nullable()->change();
            $table->string('tu_password')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('credentials', function($table)
        {

        });
    }
}
