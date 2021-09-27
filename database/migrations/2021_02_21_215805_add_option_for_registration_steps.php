<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOptionForRegistrationSteps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        DB::statement("ALTER TABLE client_details CHANGE COLUMN registration_steps registration_steps ENUM('registered', 'important_information', 'documents', 'credentials', 'review', 'finished') DEFAULT 'registered'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("ALTER TABLE client_details CHANGE COLUMN registration_steps registration_steps ENUM('registered', 'documents', 'credentials', 'review', 'finished') DEFAULT 'registered'");
    }
}
