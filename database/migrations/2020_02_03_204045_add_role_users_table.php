<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRoleUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE users CHANGE COLUMN role role ENUM('super admin', 'admin', 'client', 'affiliate', 'receptionist') DEFAULT 'client'");
    }

    public function down()
    {
        DB::statement("ALTER TABLE users CHANGE COLUMN role role ENUM('super admin', 'admin', 'client', 'affiliate', 'receptionist') DEFAULT 'client' ");
    }
}
