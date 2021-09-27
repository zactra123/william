<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddParentIdToClientAttachments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('client_attachment', function (Blueprint $table) {
            $table->bigInteger('parent_id')->nullable()->unsigned()->after("user_id");
            $table->foreign('parent_id')->references('id')->on('client_attachment')->onDelete("CASCADE");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('client_attachment', function (Blueprint $table) {
            //
        });
    }
}
