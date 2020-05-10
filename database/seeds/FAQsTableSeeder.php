<?php

use Illuminate\Database\Seeder;

class FAQsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faqs')->truncate();

        DB::table('faqs')->insert([

            [
                'title'=> 'What do credit repair companies do?',
                'description'=>'Credit repair companies help their customers raise their credit scores by removing 
                                negative items, like bankruptcies, foreclosures, charge-offs, and more. We pull your 
                                credit report and identify items to dispute; initiate and follow-through on those 
                                disputes, utilizing insider knowledge to remove negative items from your report; and 
                                make sure that credit reporting bureaus have up-to-date information in order to raise 
                                your credit score. At the end, you receive the ability to qualify for credit—loans, 
                                mortgages, credit cards, and more—without the hassle and difficulty of disputing 
                                negative items yourself.',

            ],
            [
                'title'=>'Why is it important to fix bad credit?',
                'description'=> 'Living with bad credit is hard, because credit impacts so many areas of our day-to-day 
                                lives. If you need a loan for any reason—to purchase a car, a home, or even just a new 
                                cell phone—whether or not you are approved is based on your credit score. If it’s too 
                                low, then lenders won’t be eager to finance your purchase… And if they do, your 
                                interest rate (which is based on your credit score) may be sky-high, leading to higher 
                                payments and more debt over time.
                                
                                Bad credit can also impact your insurance premiums (low credit scores are sometimes 
                                viewed as a “high-risk” behavior), leading to more money spent each month on a variety 
                                of insurances.
                                Even employers look at your credit score! A low score can make you seem careless or 
                                disorganized to a potential employer—two traits that tend to be seen unfavorably.',

            ],
            [
                'title'=>'Can credit repair benefit me?',
                'description'=> 'If you have a low credit score, then credit repair can be incredibly beneficial to 
                                you. Credit scores drive your access to financing, which can impact your ability to 
                                get housing, transportation, credit cards, and more. If you are able to secure 
                                financing with poor credit, then the interest rates offered to you are likely to be 
                                unacceptably high—sometimes resulting in thousands of extra dollars “wasted” over the 
                                life of a loan or mortgage. So—if your score isn’t exactly high and you are looking to 
                                rent or buy a home, lease or purchase a vehicle, or have access to a credit card, then 
                                credit repair can be very beneficial to you.',

            ],
            [
                'title'=>'What are “negative items” on a credit report? ',
                'description'=>'Your credit report keeps track of your financial (and personal) history for the previous
                                seven years. Anything you’ve had financed—a car, a home, Christmas presents for your 
                                children—can find its way into your report. If you make payments on-time and succeed in
                                 paying off your debts, then most items (accounts) on your score will be positive 
                                 (raising your score) or neutral.When you fail to pay debts on time, however, then that 
                                 is reported to credit bureaus, negative items enter your report, and your credit score 
                                 falls. Some examples of negative items that may be in your credit report are any late 
                                 payments you’ve made, repossessions, bankruptcies, foreclosures, and any charges 
                                 you’ve failed to pay off that have gone into collection or become a charge-off. These 
                                 items can greatly impact your credit score—some of them even by more than 200 points!',

            ],
            [
                'title'=>'What impact do negative items have on credit scores?',
                'description'=>'Negative items—like late payments, repossessions, bankruptcies, foreclosures, 
                                charge-offs, and collections—can greatly impact your credit score…Sometimes by more 
                                than 200 points! How much a given item impacts your score depends on its type 
                                (a bankruptcy impacts your score much more than a single late payment) and how many of 
                                that item you have on your file (multiple late payments means each incidence impacts 
                                your score more).
                                
                                Because they can impact your credit score so greatly, it’s important to try to minimize 
                                the number of negative items on your credit report. It can be tricky navigating that 
                                process alone—and even after hours spent contacting your creditors, you may still fail 
                                to resolve negative items due to a lack of knowledge of your creditor’s legal 
                                responsibilities towards you regarding reporting information to credit bureaus. 
                                That’s why relying on experts like those at our firm is the best option to raising 
                                your credit score.',

            ],
            [
                'title'=>'What is a “charge-off”? How does one change my credit score?',
                'description'=>"When you take out credit, you are responsible for making payments on that account until 
                                it is paid off. Sometimes, life gets in the way… and you may end up missing a 
                                payment—or two or three. If 180 days pass without a payment from you, then your 
                                creditor will “charge-off” your account, which allows them to count it as a loss for 
                                tax purposes. Your creditor will no longer attempt to collect your payments.
                                
                                That may sound great—like you’re off the hook for your debt. But that isn’t the case. 
                                Your creditor will sell your debt to a collections agency who will take up the task of 
                                collecting payments.
                                
                                Once this has happened, your credit score will fall, causing your current creditors to 
                                raise your interest rates and many potential creditors to decline your application for 
                                credit. You don’t want a charge-off on your credit report, so don’t let yours linger. 
                                 can help dispute charge-offs and other negative items and improve your
                                 score.",

            ],
            [
                'title'=>'All the negative items on my report are accurate—what can you do?',
                'description'=>'Our experts know the world of credit inside and out. We know that there are many means 
                                to change your credit score and your life. Creditors collect information on your car 
                                payments, housing payments, employment, and more, and it is their responsibility to make 
                                sure that the information in your report is substantiated, timely, accurate, and (as far 
                                is possible) fair. We have the expertise to fight negative items on your report by 
                                communicating with creditors and ensuring they meet these obligations to you in their 
                                reports to credit bureaus. So even if everything in your report is accurate, with expert 
                                negotiators like those on our Prudent Credit Solutions team on your side, there’s more room for 
                                growth than you may think!',

            ],
            [
                'title'=>'How long will it take to fix my credit?',
                'description'=>'The time it takes to fix bad credit varies, and is unique to each person’s situation. 
                                We work diligently, however, to dispute negative items and help change your report and 
                                score as quickly as possible.',

            ],
            [
                'title'=>'What is a late payment? How can they be removed from my report?',
                'description'=>'Late payments are precisely what their name sounds like—times when payment on a loan, 
                                mortgage, or other line of credit came in late (typical scales are 30 days, 60 days, and 
                                90 days). Your credit report keeps track of your late payments from all your accounts, 
                                and the more you have, the more they impact your score. Like other negative items, 
                                they can be removed in different ways. Sometimes, for the 30- and 60-day late payments, 
                                you can write to your creditor and request that they removed your late payment item as 
                                an act of goodwill. This might work if the late payment was a one-time mistake and the 
                                payment was less than 60 days late, but isn’t likely to work if your payments have been 
                                late many times before. You can also work to prevent future late payments by setting up 
                                automatic payments from your bank account. To solve bigger issues with late payments, 
                                you’ll want to dispute with a credit bureau to try and have the items removed. That’s 
                                our specialty at Prudent Credit Solutions—we know all the legal and financial ins and outs of 
                                credit, which allows us to better handle the disputation process—and get a better 
                                outcome for you.',

            ],
            [
                'title'=>'How does a foreclosure impact my credit score?',
                'description'=>'Owning a home can either elevate or destroy your credit report. If you find that you 
                                are unable to make payments on your home for too long (usually three months or more), 
                                then you lender will begin foreclosure proceedings—which tend to end with eviction from 
                                your home, legal action, and lasting damage to your credit. Foreclosures stay on your 
                                report for up to seven years and can make it difficult to find another mortgage as you 
                                wait for the foreclosure to disappear from your report.
                                
                                Short sales, also known as “deed-in-lieu of foreclosures,” let homeowners avoid 
                                foreclosure by selling their house for less than its worth to discharge their debt, 
                                but they still lower your score drastically.',

            ],
            [
                'title'=>'Is credit repair like debt settlement?',
                'description'=>'Credit repair and debt settlement are two different tools. Credit repair helps build up 
                                your credit report (aka your financial reputation) so that you can get the credit you 
                                need. This occurs through us contacting your creditors and disputing negative claims on 
                                your report.
                                
                                Debt settlement companies contact your creditors to negotiate a payment plan for you to 
                                pay off your debt. This process can, unfortunately, cause your credit to look even worse, 
                                complicating your ability to get credit in the near and distant future.',

            ],
            [
                'title'=>'What are credit bureaus?',
                'description'=>'Credit bureaus, also known as consumer reporting agencies, are businesses that collect 
                                consumer data from multiple sources (most typically, creditors and courthouses) to sell 
                                to any potential lenders you may have in the future. The information they sell is 
                                compiled into a credit report. America’s three main credit bureaus are Experian, Equifax,
                                 and TransUnion.',

            ],
            [
                'title'=>'Can credit repair help if I’m currently going through a bankruptcy?',
                'description'=>'You know that filing for bankruptcy is going to impact your credit. It might seem a bit 
                                premature to consider credit repair when you’re still going through a bankruptcy, but 
                                it’s the perfect time to seek help with credit repair because revised items can easily 
                                be incorrectly reported on your score and harm your credit unnecessarily. If you contact 
                                Prudent Credit Solutions while filing for bankruptcy, we can work with you to make sure that 
                                all items appear correctly (and that any incorrect items are removed from your score), 
                                ensuring that you get the best possible outcome from a stressful situation.',

            ],


        ]);
    }
}
