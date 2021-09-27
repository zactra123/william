<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function change()
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->dropColumn('answer');
        });


    }

}
