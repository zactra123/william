<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSeoRoleUsersTable extends Migration
{

    public function up()
    {
        DB::statement("ALTER TABLE users CHANGE COLUMN role role ENUM('super admin', 'admin', 'client', 'affiliate', 'receptionist', 'seo') DEFAULT 'client'");
    }

    public function down()
    {
        DB::statement("ALTER TABLE users CHANGE COLUMN role role ENUM('super admin', 'admin', 'client', 'affiliate', 'receptionist', 'seo') DEFAULT 'client' ");
    }
}
