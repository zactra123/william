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
                'type' =>1,
                'path' =>'states/Flag_of_New_Hampshire.png',
            ],
            [
                'full_name' =>'Maine',
                'name' =>'ME',
                'type' =>2,
                'path' =>'states/Flag_of_Maine.png',

            ],
            [
                'full_name' =>'Vermont',
                'name' =>'VT',
                'type' =>2,
                'path' =>'states/Flag_of_Vermont.png',
            ],
            [
                'full_name' =>'Massachusetts',
                'name' =>'MA',
                'type' =>1,
                'path' =>'states/Flag_of_Massachusetts.png',
            ],
            [
                'full_name' =>'Rhode Island',
                'name' =>'RI',
                'type' =>1,
                'path' =>'states/Flag_of_Rhode_Island.png',
            ],
            [
                'full_name' =>'Connecticut',
                'name' =>'CT',
                'type' =>2,
                'path' =>'states/Flag_of_Connecticut.png',
            ],
            [
                'full_name' =>'New York',
                'name' =>'NY',
                'type' =>2,
                'path' =>'states/Flag_of_New_York.png',
            ],
            [
                'full_name' =>'New Jersey',
                'name' =>'NJ',
                'type' =>2,
                'path' =>'states/Flag_of_New_Jersey.png',
            ],
            [
                'full_name' =>'Pennsylvania',
                'name' =>'PA',
                'type' =>2,
                'path' =>'states/Flag_of_Pennsylvania.png',
            ],
            [
                'full_name' =>'Maryland',
                'name' =>'MD',
                'type' =>1,
                'path' =>'states/Flag_of_Maryland.png',
            ],
            [
                'full_name' =>'Delaware',
                'name' =>'DE',
                'type' =>2,
                'path' =>'states/Flag_of_Delaware.png',
            ],
            [
                'full_name' =>'Virginia',
                'name' =>'VA',
                'type' =>1,
                'path' =>'states/Flag_of_Virginia.png',
            ],
            [
                'full_name' =>'West Virginia',
                'name' =>'WV',
                'type' =>1,
                'path' =>'states/Flag_of_West_Virginia.png',
            ],
            [
                'full_name' =>'North Carolina',
                'name' =>'NC',
                'type' =>1,
                'path' =>'states/Flag_of_North_Carolina.png',
            ],
            [
                'full_name' =>'South Carolina',
                'name' =>'SC',
                'type' =>2,
                'path' =>'states/Flag_of_South_Carolina.png',
            ],
            [
                'full_name' =>'Georgia',
                'name' =>'GA',
                'type' =>1,
                'path' =>'states/Flag_of_Georgia.png',
            ],
            [
                'full_name' =>'Florida',
                'name' =>'FL',
                'type' =>2,
                'path' =>'states/Flag_of_Florida.png',
            ],
            [
                'full_name' =>'Ohio',
                'name' =>'OH',
                'type' =>2,
                'path' =>'states/Flag_of_Ohio.png',
            ],
            [
                'full_name' =>'Indiana',
                'name' =>'IN',
                'type' =>2,
                'path' =>'states/Flag_of_Indiana.png',
            ],
            [
                'full_name' =>'Illinois',
                'name' =>'IL',
                'type' =>2,
                'path' =>'states/Flag_of_Illinois.png',
            ],
            [
                'full_name' =>'Michigan',
                'name' =>'MI',
                'type' =>1,
                'path' =>'states/Flag_of_Michigan.png',
            ],
            [
                'full_name' =>'Wisconsin',
                'name' =>'WI',
                'type' =>2,
                'path' =>'states/Flag_of_Wisconsin.png',
            ],
            [
                'full_name' =>'Kentucky',
                'name' =>'KY',
                'type' =>2,
                'path' =>'states/Flag_of_Kentucky.png',
            ],
            [
                'full_name' =>'Tennessee',
                'name' =>'TN',
                'type' =>1,
                'path' =>'states/Flag_of_Tennessee.png',
            ],
            [
                'full_name' =>'Alabama',
                'name' =>'AL',
                'type' =>1,
                'path' =>'states/Flag_of_Alabama.png',
            ],
            [
                'full_name' =>'Mississippi',
                'name' =>'MS',
                'type' =>1,
                'path' =>'states/Flag_of_Mississippi.png',
            ],
            [
                'full_name' =>'Arkansas',
                'name' =>'AR',
                'type' =>2,
                'path'=>'states/Flag_of_Arkansas.png'
            ],
            [
                'full_name' =>'Louisiana',
                'name' =>'LA',
                'type' =>2,
                'path' =>'states/Flag_of_Louisiana.png',
            ],
            [
                'full_name' =>'Oklahoma',
                'name' =>'OK',
                'type' =>2,
                'path' =>'states/Flag_of_Oklahoma.png',
            ],
            [
                'full_name' =>'Texas',
                'name' =>'TX',
                'type' =>1,
                'path' =>'states/Flag_of_Texas.png',
            ],
            [
                'full_name' =>'Minnesota',
                'name' =>'MN',
                'type' =>1,
                'path' =>'states/Flag_of_Minnesota.png',
            ],
            [
                'full_name' =>'Iowa',
                'name' =>'IA',
                'type' =>2,
                'path' =>'states/Flag_of_Iowa.png',
            ],
            [
                'full_name' =>'Missouri',
                'name' =>'MO',
                'type' =>1,
                'path' =>'states/Flag_of_Missouri.png',
            ],
            [
                'full_name' =>'North Dakota',
                'name' =>'ND',
                'type' =>2,
                'path' =>'states/Flag_of_North_Dakota.png',
            ],
            [
                'full_name' =>'South Dakota',
                'name' =>'SD',
                'type' =>1,
                'path' =>'states/Flag_of_South_Dakota.png',
            ],
            [
                'full_name' =>'Nebraska',
                'name' =>'NE',
                'type' =>1,
                'path' =>'states/Flag_of_Nebraska.png',
            ],
            [
                'full_name' =>'Kansas',
                'name' =>'KS',
                'type' =>2,
                'path' =>'Flag_of_Kansas.png',
            ],
            [
                'full_name' =>'Montana',
                'name' =>'MT',
                'type' =>1,
                'path' =>'states/Flag_of_Montana.png',
            ],
            [
                'full_name' =>'Idaho',
                'name' =>'ID',
                'type' =>1,
                'path' =>'states/Flag_of_Idaho.png',
            ],
            [
                'full_name' =>'Wyoming',
                'name' =>'WY',
                'type' =>1,
                'path' =>'states/Flag_of_Wyoming.png',
            ],
            [
                'full_name' =>'Colorado',
                'name' =>'CO',
                'type' =>1,
                'path' =>'states/Flag_of_Colorado.png',
            ],
            [
                'full_name' =>'New Mexico',
                'name' =>'NM',
                'type' =>2,
                'path' =>'states/Flag_of_New_Mexico.png',
            ],
            [
                'full_name' =>'Arizona',
                'name' =>'AZ',
                'type' =>1,
                'path' =>'states/Flag_of_Arizona.png',
            ],
            [
                'full_name' =>'Utah',
                'name' =>'UT',
                'type' =>1,
                'path' =>'states/Flag_of_Utah.png',
            ],
            [
                'full_name' =>'Nevada',
                'name' =>'NV',
                'type' =>1,
                'path' =>'states/Flag_of_Nevada.png',
            ],
            [
                'full_name' =>'Washington',
                'name' =>'WA',
                'type' =>1,
                'path' =>'states/Flag_of_Washington.png',
            ],
            [
                'full_name' =>'Oregon',
                'name' =>'OR',
                'type' =>1,
                'path' =>'states/Flag_of_Oregon.png',
            ],
            [
                'full_name' =>'California',
                'name' =>'CA',
                'type' =>1,
                'path' =>'states/Flag_of_California.png',
            ],
            [
                'full_name' =>'Alaska',
                'name' =>'AK',
                'type' =>1,
                'path' =>'states/Flag_of_Alaska.png',
            ],

            [
                'full_name' =>'Hawaii',
                'name' =>'HI',
                'type' =>2,
                'path' =>'states/Flag_of_Hawaii.png',
            ],
            [
                'full_name' =>'District of Columbia',
                'name' =>'DC',
                'type' =>2,
                'path' =>'states/District_of_Columbia.png',
            ],

//            [
//                'full_name' =>'Puerto Rico',
//                'name' =>'PR',
//            ],
//            [
//                'full_name' =>'Guam, American Samoa & Philippines',
//                'name' =>'AT',
//            ],
//            [
//                'full_name' =>'Virgin Islands',
//                'name' =>'VI',
//            ],
//
//            [
//                'full_name' =>'Railroad',
//                'name' =>'RR',
//            ],
//            [
//                'full_name' =>'Enumeration of Entery',
//                'name' =>"N\\A",
//            ],

        ]);
    }
}
