<?php

use Illuminate\Database\Seeder;

class HomePagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('home_pages')->truncate();

        DB::table('home_pages')->insert([

            [
                'url' => 'why-your-credit-score-is-important',
                'title' =>'Why Your Credit Score Is Important',
                'sub_content' =>"<p style='text-align: justify'>Your credit score is your rating on your ability to pay 
                                    back debt.  When you go to a bank to request a loan, credit card, mortgage, line of 
                                    credit, etc. they will look at your credit score. ...  </p>",
                "content" => "<p style='text-align: justify'> 
                                Your credit score is your rating on your ability to pay back debt.  When you go to a 
                                bank to request a loan, credit card, mortgage, line of credit, etc. they will look at 
                                your credit score. This shows all the previous loans you’ve had, how often you make 
                                payments on time, and what your total balances are. 
                               </p>
                                <p style='text-align: justify'> 
                                If your credit score is considered poor (in most cases a score below 600) chances of a 
                                bank trusting you with their money are slim! This means it will be difficult to buy a 
                                car, a home, or even get a credit card. Suffice it to say that keeping your credit score
                                 in a healthy state is very important (to say the least).
                                </p>
                               "

             ],

            [
                'url' => 'how-credit-repair-works',
                'title' =>'How Credit Repair Works',
                'sub_content' =>"<p style='text-align: justify'>The hardest part about repairing your credit is correcting the errors on your 
                                    credit profile and negotiating the debt balances you owe. To give you an overview of
                                     the process, here’s how we help you repair your credit:... </p>",

                "content" => "<p style='text-align: justify'>YThe hardest part about repairing your credit is correcting the errors on your 
                                    credit profile and negotiating the debt balances you owe. To give you an overview of
                                     the process, here’s how we help you repair your credit: </p>
                                     
                                    <p style='text-align: justify'>1.	We’ll review your credit profile, finances, 
                                    income and detailed credit reports</p>
                                    <p style='text-align: justify'> 2.	We’ll identify the items that are incorrect on 
                                    your profile. We’ll also review each debt in collections to asses the opportunities 
                                    to negotiate a lower payment.</p>
                                    <p style='text-align: justify'>3.	Next, we dispute the errors by contacting the 
                                    credit bureaus and demanding they be fixed. We reach out to collection agencies on 
                                    your behalf and dispute your bad debts.</p>
                                    <p style='text-align: justify'>4.	We’ll hold your hand through the whole process 
                                    to make sure we fix the errors, negotiate the payments, and continue to monitor your
                                     credit score health.</p>
                                     
                                    <p style='text-align: justify'> Dealing with credit bureaus and collection agencies 
                                    is a tedious task and requires tough conversations. We have the knowledge of their 
                                    processes and the legal powers you have. This allows us to make sure you’re not 
                                    being taken advantage of and get you the best possible options to repair your 
                                    credit.</p>",
            ],

            [
                'url' => 'credit-repair-services',
                'title' =>'Credit Repair Services',
                'sub_content' =>"<p style='text-align: justify'>Did you know that about 68 million Americans are 
                                considered to have poor credit scores? A bad credit score in this study is anything 
                                lower than 601 credit score.  So, how do they get there?...  </p>",
                "content" => "<p style='text-align: justify'>Did you know that about 68 million Americans are considered
                                to have poor credit scores? A bad credit score in this study is anything lower than 
                                601 credit score.
                                [<a href='https://www.credit.com/blog/2016/02/how-many-americans-have-bad-credit-136868/'>
                                click</a>].  So, how do they get there? Most often, its due to poor on time 
                                payment history, unpaid collection debts, and high credit balances. </p>
                                     
                                <p style='text-align: justify'>How is one to fix their credit score with such a heavy 
                                financial burden on their back? That’s where Credit Repair Service companies like Better
                                 Credit Fix can help. From negotiating your collections balances, to disputing errors on 
                                 your report, and providing financial guidance, we can help. The reality is, you’re 
                                 totally capable of fixing your credit quickly, you just need someone to point you in
                                  the right direction!</p>",

            ],

        ]);
    }
}
