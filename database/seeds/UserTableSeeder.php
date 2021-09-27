<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
                'first_name' => 'William',
                'last_name' => 'Mcgrayan',
                'email' => 'william787@ymail.com',
                'password' => Hash::make('y1983EREVAN!'),
                'role'=>'super admin',
        ]);

    }
}
