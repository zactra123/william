<?php

use Illuminate\Database\Seeder;

class NegativeTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('negative_types')->truncate();

        DB::table('negative_types')->insert([

            [
                'name' => 'Account Blocking'
            ],
            [
                'name' => 'Lates'
            ],
            [
                'name' => 'Bankruptcy'
            ],
            [
                'name' => 'Inquiries'
            ],

            [
                'name' => 'Personal Information'
            ],

            [
                'name' => 'Student Loans'
            ],
            [
                'name' => 'Auto Loans'
            ],
            [
                'name' => 'Debt Settlement'
            ],
            [
                'name' => 'Collections'
            ]

        ]);


    }

}
