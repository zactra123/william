<?php

use Illuminate\Database\Seeder;

class SecretQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('secret_questions')->insert([

            [
                'question' =>'What city were you born in?',
            ],
            [
                'question' =>'What was the make of your First Car?',
            ],
            [
                'question' =>'What is your favorite color?',
            ]

        ]);
    }
}
