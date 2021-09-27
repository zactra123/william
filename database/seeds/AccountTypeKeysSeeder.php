<?php

use Illuminate\Database\Seeder;

class AccountTypeKeysSeeder extends Seeder
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

        DB::table('account_type_keys')->truncate();

        DB::table('account_type_keys')->insert([
            [
                'key_word' => 'BANK'
            ],
            [
                'key_word' => 'BANCORP'
            ],
            [
                'key_word' => 'BANCO'
            ],
            [
                'key_word' => 'BANCSHARE'
            ],
            [
                'key_word' => 'CREDIT UNION'
            ],
            [
                'key_word' => 'CREDIT CARD'
            ],
            [
                'key_word' => 'CREDIT'
            ],
            [
                'key_word' => 'CASH'
            ],
            [
                'key_word' => 'PAYDAY'
            ],
            [
                'key_word' => 'CHECK'
            ],
            [
                'key_word' => 'MORTGAGE'
            ],
            [
                'key_word' => 'HOME LOAN'
            ],
            [
                'key_word' => 'LOAN SERVICE'
            ],
            [
                'key_word' => 'LOAN MANAGEMENT SERVICE'
            ],
            [
                'key_word' => 'LOAN SERVICING'
            ],
            [
                'key_word' => 'AUTO FINANCE'
            ],
            [
                'key_word' => 'ROAD'
            ],
            [
                'key_word' => 'CAR'
            ],
            [
                'key_word' => 'MOTOR'
            ],
            [
                'key_word' => 'RECOVERY'
            ],
            [
                'key_word' => 'COLLECTION'
            ],
            [
                'key_word' => 'REVENUE SOLUTIONS'
            ],
            [
                'key_word' => 'STUDENT LOAN'
            ],
            [
                'key_word' => 'EDUCATIONAL'
            ],
            [
                'key_word' => 'EDUCATION'
            ],
            [
                'key_word' => 'STUDENT'
            ],
            [
                'key_word' => 'VACATION OWNERSHIP'
            ],
            [
                'key_word' => 'MOBILE'
            ],
            [
                'key_word' => 'MOBILITY'
            ],
            [
                'key_word' => 'COMMUNICATION'
            ]
        ]);

    }
}
