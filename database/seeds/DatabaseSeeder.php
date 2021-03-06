<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            $this->call(HomePageContent::class);
            $this->call(HomePagesSeeder::class);
            $this->call(FAQsTableSeeder::class);
            $this->call(NegativeTypesTableSeeder::class);
            $this->call(UserTableSeeder::class);
            $this->call(SloganSeeder::class);
            $this->call(SecretQuestionSeeder::class);
            $this->call(BankLogosSeeder::class);
            $this->call(AddBankLogosSeeder::class);
            $this->call(TuPaymentPatternSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
