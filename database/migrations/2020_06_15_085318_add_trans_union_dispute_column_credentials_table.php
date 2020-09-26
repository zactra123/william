<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTransUnionDisputeColumnCredentialsTable extends Migration
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
            $table->string('tu_dis_login')->nullable()->after('tu_answer');
            $table->string('tu_dis_password')->nullable()->after('tu_dis_login');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('credentials', function($table) {
            $table->dropColumn('tu_dis_login');
            $table->dropColumn('tu_dis_password');
        });
    }
}
