<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeUploadClientDetailsNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        DB::statement("alter table upload_client_details modify first_name varchar(191) null;");
        DB::statement("alter table upload_client_details modify last_name varchar(191) null;");
        DB::statement("alter table upload_client_details modify dob date null;");
        DB::statement("alter table upload_client_details modify ssn varchar(191) null;");
        DB::statement("alter table upload_client_details modify state varchar(191) null;");
        DB::statement("alter table upload_client_details modify city varchar(191) null;");
        DB::statement("alter table upload_client_details modify address varchar(191) null;");
        DB::statement("alter table upload_client_details modify zip varchar(191) null;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
