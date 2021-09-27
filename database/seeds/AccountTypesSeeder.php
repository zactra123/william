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
                'type'=>true,
                'name' => 'CREDIT CARD'
            ],
            [
                'type'=>true,
                'name' => 'PERSONAL LOANS'
            ],
            [
                'type'=>true,
                'name' => 'CHARGE CARD'
            ],
            [
                'type'=>true,
                'name' => 'INSTALLMENT CONTRACT'
            ],
            [
                'type'=>true,
                'name' => 'CHECK CASHING'
            ],
            [
                'type'=>true,
                'name' => 'PAYDAY LOANS'
            ],
            [
                'type'=>true,
                'name' => 'MORTGAGE'
            ],
            [
                'type'=>true,
                'name' => 'AUTO LOAN'
            ],
            [
                'type'=>true,
                'name' => 'STUDENT LOAN'
            ],
            [
                'type'=>true,
                'name' => 'TIMESHARE'
            ],
            [
                'type'=>true,
                'name' => 'CELLPHONE'
            ],
            [
                'type'=>true,
                'name' => 'CABLE/TV/INTERNET PROVIDER'
            ],
            [
                'type'=>false,
                'name' => 'MED LOAN'
            ],
            [
                'type'=>false,
                'name' => 'MED CA'
            ],
            [
                'type'=>false,
                'name' => 'CREDIT CARD CA'
            ],
            [
                'type'=>false,
                'name' => 'AUTO LOAN CA'
            ],
            [
                'type'=>false,
                'name' => 'INSURANCE CA'
            ],
            [
                'type'=>false,
                'name' => 'UTILITY CA'
            ],
            [
                'type'=>false,
                'name' => 'CELL CA'
            ],
            [
                'type'=>false,
                'name' => 'RESIDENTIAL CA'
            ]
        ]);

    }
}
