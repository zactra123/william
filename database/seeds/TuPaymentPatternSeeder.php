<?php

use Illuminate\Database\Seeder;

class TuPaymentPatternSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tu_payment_patterns')->truncate();

        DB::table('tu_payment_patterns')->insert([

            [
                'negative' => false,
                'codes' =>"1",
                "description" => "Current account"
            ],
            [
                'negative' => false,
                'codes' =>"E",
                "description" => "Current account zero balance"
            ],
            [
                'negative' => true,
                'codes' =>"2",
                "description" => "Account 30 days past due date"
            ],
            [
                'negative' => true,
                'codes' =>"3",
                "description" => "Account 60 days past due date"
            ],
            [
                'negative' => true,
                'codes' =>"4",
                "description" => "Account 90 days past due date"
            ],
            [
                'negative' => true,
                'codes' =>"5",
                "description" => "Account 120 days past due date"
            ],
            [
                'negative' => true,
                'codes' =>"6",
                "description" => "Account 150+ days past due date"
            ],
            [
                'negative' => true,
                'codes' =>"X",
                "description" => "Unrated"
            ],
            [
                'negative' => true,
                'codes' =>"Y",
                "description" => "Unrated (no update received)"
            ],
            [
                'negative' => true,
                'codes' =>"J",
                "description" => "Voluntary Surrender"
            ],
            [
                'negative' => true,
                'codes' =>"K",
                "description" => "Repossession/ Paid Repossession"
            ],
            [
                'negative' => true,
                'codes' =>"G",
                "description" => "Collection/Paid Collection"
            ],
            [
                'negative' => true,
                'codes' =>"L",
                "description" => "Charge-off/Paid Charge-off"
            ],
            [
                'negative' => true,
                'codes' =>"H",
                "description" => "Foreclosure Completed"
            ],
        ]);
    }
}
