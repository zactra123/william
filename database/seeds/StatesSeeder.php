<?php

use Illuminate\Database\Seeder;

class StatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->truncate();

        DB::table('states')->insert([

            [
                'full_name' =>'New Hampshire',
                'name' =>'NH',
            ],
            [
                'full_name' =>'Maine',
                'name' =>'ME',
            ],
            [
                'full_name' =>'Vermont',
                'name' =>'VT',
            ],
            [
                'full_name' =>'Massachusetts',
                'name' =>'MA',
            ],
            [
                'full_name' =>'Rhode Island',
                'name' =>'RI',
            ],
            [
                'full_name' =>'Connecticut',
                'name' =>'CT',
            ],
            [
                'full_name' =>'New York',
                'name' =>'NY',
            ],
            [
                'full_name' =>'New Jersey',
                'name' =>'NJ',
            ],
            [
                'full_name' =>'Pennsylvania',
                'name' =>'PA',
            ],
            [
                'full_name' =>'Maryland',
                'name' =>'MD',
            ],
            [
                'full_name' =>'Delaware',
                'name' =>'DE',
            ],
            [
                'full_name' =>'Virginia',
                'name' =>'VA',
            ],
            [
                'full_name' =>'West Virginia',
                'name' =>'WV',
            ],
            [
                'full_name' =>'North Carolina',
                'name' =>'NC',
            ],
            [
                'full_name' =>'South Carolina',
                'name' =>'SC',
            ],
            [
                'full_name' =>'Georgia',
                'name' =>'GA',
            ],
            [
                'full_name' =>'Florida',
                'name' =>'FL',
            ],
            [
                'full_name' =>'Ohio',
                'name' =>'OH',
            ],
            [
                'full_name' =>'Indiana',
                'name' =>'IN',
            ],
            [
                'full_name' =>'Illinois',
                'name' =>'IL',
            ],
            [
                'full_name' =>'Michigan',
                'name' =>'MI',
            ],
            [
                'full_name' =>'Wisconsin',
                'name' =>'WI',
            ],
            [
                'full_name' =>'Kentucky',
                'name' =>'KY',
            ],
            [
                'full_name' =>'Tennessee',
                'name' =>'TN',
            ],
            [
                'full_name' =>'Tennessee',
                'name' =>'TN',
            ],
            [
                'full_name' =>'Alabama',
                'name' =>'AL',
            ],
            [
                'full_name' =>'Mississippi',
                'name' =>'MS',
            ],
            [
                'full_name' =>'Arkansas',
                'name' =>'AR',
            ],
            [
                'full_name' =>'Louisiana',
                'name' =>'LA',
            ],
            [
                'full_name' =>'Oklahoma',
                'name' =>'OK',
            ],
            [
                'full_name' =>'Texas',
                'name' =>'TX',
            ],
            [
                'full_name' =>'Minnesota',
                'name' =>'MN',
            ],
            [
                'full_name' =>'Iowa',
                'name' =>'IA',
            ],
            [
                'full_name' =>'Missouri',
                'name' =>'MO',
            ],
            [
                'full_name' =>'North Dakota',
                'name' =>'ND',
            ],
            [
                'full_name' =>'South Dakota',
                'name' =>'SD',
            ],
            [
                'full_name' =>'Nebraska',
                'name' =>'NE',
            ],
            [
                'full_name' =>'Kansas',
                'name' =>'KS',
            ],
            [
                'full_name' =>'Montana',
                'name' =>'MT',
            ],
            [
                'full_name' =>'Idaho',
                'name' =>'ID',
            ],
            [
                'full_name' =>'Wyoming',
                'name' =>'WY',
            ],
            [
                'full_name' =>'Colorado',
                'name' =>'CO',
            ],
            [
                'full_name' =>'New Mexico',
                'name' =>'NM',
            ],
            [
                'full_name' =>'Arizona',
                'name' =>'AZ',
            ],
            [
                'full_name' =>'Utah',
                'name' =>'UT',
            ],
            [
                'full_name' =>'Nevada',
                'name' =>'NV',
            ],
            [
                'full_name' =>'Washington',
                'name' =>'WA',
            ],
            [
                'full_name' =>'Oregon',
                'name' =>'OR',
            ],
            [
                'full_name' =>'California',
                'name' =>'CA',
            ],
            [
                'full_name' =>'Alaska',
                'name' =>'AK',
            ],

            [
                'full_name' =>'Hawaii',
                'name' =>'HI',
            ],
            [
                'full_name' =>'District of Columbia',
                'name' =>'DC',
            ],

            [
                'full_name' =>'Puerto Rico',
                'name' =>'PR',
            ],
            [
                'full_name' =>'Guam, American Samoa & Philippines',
                'name' =>'AT',
            ],
            [
                'full_name' =>'Virgin Islands',
                'name' =>'VI',
            ],

            [
                'full_name' =>'Railroad',
                'name' =>'RR',
            ],
            [
                'full_name' =>'Enumeration of Entery',
                'name' =>"N\\A",
            ],

        ]);
    }
}
