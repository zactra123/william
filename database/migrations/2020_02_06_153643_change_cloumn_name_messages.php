<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeCloumnNameMessages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('messages', function(Blueprint $table)
        {
            $table->renameColumn('answer', 'title');
            $table->renameColumn('question', 'description');

        });

        Schema::table('message_histories', function(Blueprint $table)
        {
            $table->renameColumn('answer', 'title');
            $table->renameColumn('question', 'description');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('messages', function(Blueprint $table)
        {
            $table->renameColumn('title' ,'answer');
            $table->renameColumn('description', 'question');

        });
        Schema::table('message_histories', function(Blueprint $table)
        {
            $table->renameColumn('title' ,'answer');
            $table->renameColumn('description', 'question');

        });


    }
}
