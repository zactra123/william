<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddQuestionAnswerColumnUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->bigInteger('secret_questions_id')->nullable()->unsigned()->after("email_count");
            $table->foreign('secret_questions_id')->references('id')->on('secret_questions')->onDelete("cascade");
            $table->string('secret_answer')->nullable()->after('secret_questions_id');

        });

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
