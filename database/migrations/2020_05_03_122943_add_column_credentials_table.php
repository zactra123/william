<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnCredentialsTable extends Migration
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
            $table->string('ex_pin')->nullable()->after('ex_answer');
            $table->string('eq_login')->nullable()->after('ex_pin');
            $table->string('eq_password')->nullable()->after('eq_login');
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
