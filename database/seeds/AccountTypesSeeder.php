<?php

use Illuminate\Database\Seeder;

class AccountTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        //disable foreign key check for this connection before running seeders
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('account_types')->truncate();

        DB::table('account_types')->insert([
            [
                'name' => 'CREDIT CARD'
            ],
            [
                'name' => 'PERSONAL LOANS'
            ],
            [
                'name' => 'RENTAL AGREEMENT'
            ],
            [
                'name' => 'AUTO ACCOUNTS'
            ],
            [
                'name' => 'MOTORCYCLE'
            ],
            [
                'name' => 'MORTGAGES'
            ],
            [
                'name' => 'HOME EQUITY LINE OF CREDIT'
            ],
            [
                'name' => 'LINE OF CREDIT'
            ],
            [
                'name' => 'UTILITY COMPANY'
            ],
            [
                'name' => 'CHILD SUPPORT'
            ],
            [
                'name' => 'BANKRUPTCY'
            ],
            [
                'name' => 'COLLECTIONS'
            ]
        ]);

    }
}
