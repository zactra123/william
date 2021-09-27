<?php

use Illuminate\Database\Seeder;

class AgencyTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('agency_types')->truncate();

        DB::table('agency_types')->insert([

            [
                'type'=>'ALC',
                'full_type'=>'A Law Corporation'
            ],
            [
                'type'=>'APC',
                'full_type'=>'A Professional Corporation'
            ],
            [
                'type'=>'INC',
                'full_type'=>'Corporation'
            ],
            [
                'type'=>'GP',
                'full_type'=>'General Partnership'
            ],
            [
                'type'=>'LLC',
                'full_type'=>'Limited Liability Company'
            ],
            [
                'type'=>'LLP',
                'full_type'=>'Limited Liability Partnership'
            ],
            [
                'type'=>'LP',
                'full_type'=>'Limited Partnership'
            ],
            [
                'type'=>'LTD',
                'full_type'=>'Limited Trade Distribution'
            ],
            [
                'type'=>'N.A.',
                'full_type'=>'National Association'
            ],
            [
                'type'=>'PA',
                'full_type'=>'Professional Association'
            ],
            [
                'type'=>'P.C.',
                'full_type'=>'Professional Corporation'
            ],
            [
                'type'=>'PLLC',
                'full_type'=>'Professional Limited Liability Company'
            ],
            [
                'type'=>'SP',
                'full_type'=>'Sole Proprietorship'
            ],

        ]);
    }
}
