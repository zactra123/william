<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCloumnCredentialsTables extends Migration
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
            $table->string('tu_question')->nullable()->after('tu_password');
            $table->string('tu_answer')->nullable()->after('tu_question');
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
            $table->dropColumn('tu_question');
            $table->dropColumn('tu_answer');
        });
    }
}
