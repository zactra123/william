<?php

use Illuminate\Database\Seeder;

class AccountTypeKeyWordSeeder extends Seeder
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

        DB::table('account_type_key_word')->truncate();

        DB::table('account_type_key_word')->insert([
            [
                'account_type_key_id'=>1,
                'account_type_id' =>1
            ],
            [
                'account_type_key_id'=>1,
                'account_type_id' =>2
            ],
            [
                'account_type_key_id'=>1,
                'account_type_id' =>7
            ],
            [
                'account_type_key_id'=>1,
                'account_type_id' =>3
            ],
            [
                'account_type_key_id'=>1,
                'account_type_id' =>13
            ],
            [
                'account_type_key_id'=>1,
                'account_type_id' =>8
            ],
            [
                'account_type_key_id'=>2,
                'account_type_id' =>1
            ],
            [
                'account_type_key_id'=>2,
                'account_type_id' =>2
            ],
            [
                'account_type_key_id'=>2,
                'account_type_id' =>7
            ],
            [
                'account_type_key_id'=>2,
                'account_type_id' =>3
            ],
            [
                'account_type_key_id'=>2,
                'account_type_id' =>13
            ],
            [
                'account_type_key_id'=>2,
                'account_type_id' =>8
            ],
            [
                'account_type_key_id'=>3,
                'account_type_id' =>1
            ],
            [
                'account_type_key_id'=>3,
                'account_type_id' =>2
            ],
            [
                'account_type_key_id'=>3,
                'account_type_id' =>7
            ],
            [
                'account_type_key_id'=>3,
                'account_type_id' =>3
            ],
            [
                'account_type_key_id'=>3,
                'account_type_id' =>13
            ],
            [
                'account_type_key_id'=>3,
                'account_type_id' =>8
            ],
            [
                'account_type_key_id'=>4,
                'account_type_id' =>1
            ],
            [
                'account_type_key_id'=>4,
                'account_type_id' =>2
            ],
            [
                'account_type_key_id'=>4,
                'account_type_id' =>7
            ],
            [
                'account_type_key_id'=>4,
                'account_type_id' =>3
            ],
            [
                'account_type_key_id'=>4,
                'account_type_id' =>13
            ],
            [
                'account_type_key_id'=>4,
                'account_type_id' =>8
            ],
            [
                'account_type_key_id'=>5,
                'account_type_id' =>8
            ],
            [
                'account_type_key_id'=>5,
                'account_type_id' =>2
            ],
            [
                'account_type_key_id'=>5,
                'account_type_id' =>7
            ],
            [
                'account_type_key_id'=>6,
                'account_type_id' =>8
            ],
            [
                'account_type_key_id'=>6,
                'account_type_id' =>2
            ],
            [
                'account_type_key_id'=>6,
                'account_type_id' =>7
            ],
            [
                'account_type_key_id'=>7,
                'account_type_id' =>8
            ],
            [
                'account_type_key_id'=>7,
                'account_type_id' =>2
            ],
            [
                'account_type_key_id'=>7,
                'account_type_id' =>7
            ],
            [
                'account_type_key_id'=>8,
                'account_type_id' =>5
            ],
            [
                'account_type_key_id'=>8,
                'account_type_id' =>6
            ],
            [
                'account_type_key_id'=>9,
                'account_type_id' =>5
            ],
            [
                'account_type_key_id'=>9,
                'account_type_id' =>6
            ],
            [
                'account_type_key_id'=>10,
                'account_type_id' =>5
            ],
            [
                'account_type_key_id'=>10,
                'account_type_id' =>6
            ],
            [
                'account_type_key_id'=>11,
                'account_type_id' =>7
            ],
            [
                'account_type_key_id'=>12,
                'account_type_id' =>7
            ],
            [
                'account_type_key_id'=>13,
                'account_type_id' =>7
            ],
            [
                'account_type_key_id'=>14,
                'account_type_id' =>7
            ],
            [
                'account_type_key_id'=>15,
                'account_type_id' =>7
            ],
            [
                'account_type_key_id'=>16,
                'account_type_id' =>8
            ],
            [
                'account_type_key_id'=>17,
                'account_type_id' =>8
            ],
            [
                'account_type_key_id'=>18,
                'account_type_id' =>8
            ],
            [
                'account_type_key_id'=>19,
                'account_type_id' =>8
            ],
            [
                'account_type_key_id'=>20,
                'account_type_id' =>14
            ],
            [
                'account_type_key_id'=>20,
                'account_type_id' =>15
            ],
            [
                'account_type_key_id'=>20,
                'account_type_id' =>16
            ],
            [
                'account_type_key_id'=>20,
                'account_type_id' =>17
            ],
            [
                'account_type_key_id'=>20,
                'account_type_id' =>18
            ],
            [
                'account_type_key_id'=>20,
                'account_type_id' =>19
            ],

            [
                'account_type_key_id'=>20,
                'account_type_id' =>20
            ],
            [
                'account_type_key_id'=>21,
                'account_type_id' =>14
            ],
            [
                'account_type_key_id'=>21,
                'account_type_id' =>15
            ],
            [
                'account_type_key_id'=>21,
                'account_type_id' =>16
            ],
            [
                'account_type_key_id'=>21,
                'account_type_id' =>17
            ],
            [
                'account_type_key_id'=>21,
                'account_type_id' =>18
            ],
            [
                'account_type_key_id'=>21,
                'account_type_id' =>19
            ],

            [
                'account_type_key_id'=>21,
                'account_type_id' =>20
            ],

            [
                'account_type_key_id'=>22,
                'account_type_id' =>14
            ],
            [
                'account_type_key_id'=>22,
                'account_type_id' =>15
            ],
            [
                'account_type_key_id'=>22,
                'account_type_id' =>16
            ],
            [
                'account_type_key_id'=>22,
                'account_type_id' =>17
            ],
            [
                'account_type_key_id'=>22,
                'account_type_id' =>18
            ],
            [
                'account_type_key_id'=>22,
                'account_type_id' =>19
            ],
            [
                'account_type_key_id'=>22,
                'account_type_id' =>20
            ],
            [
                'account_type_key_id'=>23,
                'account_type_id' =>9
            ],
            [
                'account_type_key_id'=>24,
                'account_type_id' =>9
            ],
            [
                'account_type_key_id'=>25,
                'account_type_id' =>9
            ],
            [
                'account_type_key_id'=>26,
                'account_type_id' =>9
            ],
            [
                'account_type_key_id'=>27,
                'account_type_id' =>10
            ],
            [
                'account_type_key_id'=>28,
                'account_type_id' =>11
            ],
            [
                'account_type_key_id'=>29,
                'account_type_id' =>11
            ],
            [
                'account_type_key_id'=>30,
                'account_type_id' =>12
            ],

        ]);
    }
}
