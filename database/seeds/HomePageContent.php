<?php

use Illuminate\Database\Seeder;

class HomePageContent extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('home_page_contents')->truncate();

        DB::table('home_page_contents')->insert([

            [
                'url' => 'a-brilliant-credit-repair-option',
                'category' => 1,
                'title' =>'A Brilliant Credit Repair Option',
                'sub_content' =>'<p>Credit problems can result in very high interest rates, and prevent one from getting a loan. Credit problems can also affect one&rsquo;s employment opportunities, and ability to buy or rent a home.</p>',
                'content' =>'<p>Credit problems can result in very high interest rates, and prevent one from getting a loan. Credit problems can also affect one&rsquo;s employment opportunities, and ability to buy or rent a home. Better Credit Services Repair Program can help avoid such unwanted situations caused by credit problems, by eliminating credit reporting errors. </p>
                <p>While credit reporting mistakes are common, it can be difficult to discover and resolve them if you don&rsquo;t know the laws that control the credit reporting industry and its partakers. This credit repair tutorial will show you some of the consumer protection laws that makes credit repair successful.</p>
                <p>Different factors affect and can be used advantageously to enhance credit scores. Some of these factors involve common sense, while others are more technical. This tutorial will examine many ways in which you can enhance your credit score, and make your credit desirable to potential lenders, insurers, landlords, and employers.</p>
                <p>Credit repair is legal if it is done pursuant to the governing laws. You cannot request deletion or update of accurate and verifiable credit information. You may, however, dispute information that is at least partially inaccurate, incomplete, misleading, obsolete or does not otherwise reflect up to date information. </p>' ,

            ],

            [
                'url' => 'the-math-is-easy',
                'category' => 1,
                'title' => 'The Math is Easy.',
                'sub_content' =>'If you have a high credit score, you qualify for a low interest rate. That is, you credit determines your borrowing cost.',
                'content' =>'<p>If you have a high credit score, you qualify for a low interest rate. That is, you credit determines your borrowing cost. Let us take a look at the possible financial benefits of Credit Repair.</p>' ,

            ],

            [
                'url' => 'every-point-is-important',
                'category' => 1,
                'title' =>'Every Point is Important',
                'sub_content' => 'The following example from Fair Isaac Corporation, which is based on national averages, will show you the potential result of a 100-point enhancement to your credit scores.',
                'content' => '<p>The following example from Fair Isaac Corporation, which is based on national averages, will show you the potential result of a 100-point enhancement to your credit scores.</p>
                <ul style="list-style-type:circle;margin-left:30px;">
                    <li>A $300,000 mortgage will save $264 per month if there is a 100-point enhancement in your credit score.&nbsp;</li>
                    <li>A $25,000 automobile loan will save you $65 if there is a 100-point enhancement in your credit score.&nbsp;</li>
                    <li>Your total monthly savings will be $329.</li>
                </ul>',

            ],
            [
                'url' => 'let\'s-multiply',
                'category' => 1,
                'title' =>'Let\'s Multiply',
                'sub_content' =>'Investing $329 monthly over the next ten years in an account that earns 5% will give you $51,000. Over the next 20 years, this number will increase to $135,000.',
                'content'=>'<p>Investing $329 monthly over the next ten years in an account that earns 5% will give you $51,000. Over the next 20 years, this number will increase to $135,000.</p>',

            ],

            [
                'url' => 'furthermore',
                'category' => 1,
                'title' => 'Further more',
                'sub_content' =>'The financial benefits of credit repair are not restricted to just mortgages and automobile loans; they also impact credit cards and other debts, as well as employment and insurance. It all makes sense! Are you ready to get more information?',
                'content'=> '<p>The financial benefits of credit repair are not restricted to just mortgages and automobile loans; they also impact credit cards and other debts, as well as employment and insurance. It all makes sense! Are you ready to get more information?</p>

                <p>Credit repair businesses are prohibited from ordering credit reports for their customers. The FCRA (Section 604) prohibits the credit bureaus from furnishing credit reports to third parties for any reason other than the &ldquo;permissible purpose&rdquo; defined in the FCRA, which include determination of credit worthiness, underwriting of insurance, and employment screening. </p>',

            ],

            [
                'url' => 'innovis',
                'category' => 2,
                'title' =>'Innovis',
                'sub_content'=>'Innovis is the main assembler of credit data used to credit card companies for pre-screening of unwanted credit card offers. They are not always in the public eye presently, but that may change in future.',
                'content'=>'<p>Innovis is the main assembler of credit data used to credit card companies for pre-screening of unwanted credit card offers. They are not always in the public eye presently, but that may change in future. In 2001, mortgage giants Fannie Mae and Freddie Mac, told their mortgage servicers to report their debt payment histories to Innovis, potentially expanding the company&rsquo;s future scope. Fannie Mae and Freddie Mac have contributed to the rise of a credit industry participant on many occasions. The creator of the scoring model, Fair Isaac Corporation, will show this fact to us later in the tutorial.</p>',

            ],
            [
                'url' => 'chexsystems',
                'category' => 2,
                'title' =>'Chex Systems',
                'sub_content'=>'ChexSystems, according to their website, &ldquo;is comprised of member financial institutions that regularly contribute information on mishandled checking and savings accounts to a central location.',
                'content'=>'<p>ChexSystems, according to their website, &ldquo;is comprised of member financial institutions that regularly contribute information on mishandled checking and savings accounts to a central location. ChexSystems shares this information among member institutions to help them assess the risk of opening new accounts.&rdquo; ChexSystems reports contain information about bounced checks and unresolved insufficient funds charges, which may be considered by banks when opening new accounts.</p>',

            ],
            [

                'url' => 'chexsystems-and-credit-repair',
                'category' => 2,
                'title' =>'Chex Systems and Credit Repair',
                'sub_content'=>'Fair Credit Reporting Act (FCRA) defines ChexSystems as a national credit bureau that must agree will all FCRA requirements. ',
                'content'=>'<p>Fair Credit Reporting Act (FCRA) defines ChexSystems as a national credit bureau that must agree will all FCRA requirements. This includes providing a free yearly report &ndash; which can be easily ordered on their website. It also includes processing disputes, and allowing the use of security alerts to avoid identity theft.</p>',

            ],
            [
                'url' => 'which-credit-report-best',
                'category' => 2,
                'title' =>'Which Credit Report is Best?',
                'sub_content'=>'The Fair and Accurate Credit Transactions Act (FACTA) of 2003, an amendment to the FCRA, included a provision that credit bureaus must allow consumers one free credit report every twelve months.',
                'content'=>'<p class="MsoNormal"><strong><span style="font-size:12.0pt;line-height:107%;font-family:\'Times New Roman\',\'serif\';">Free Credit Reports</span></strong></p><p>The Fair and Accurate Credit Transactions Act (FACTA) of 2003, an amendment to the FCRA, included a provision that credit bureaus must allow consumers one free credit report every twelve months. AnnualCreditReport.com was created for the purpose of providing access to people to their annual free credit reports. This website is a hub that will guide you through the process of obtaining your reports from each credit reporting agency.</p><p class="MsoNormal"><strong><span style="font-size:12.0pt;line-height:107%;font-family:\'Times New Roman\',\'serif\';">The Best Choice for Credit Repair</span></strong></p><p>From a credit repair perspective, these free reports are not the best option because they lack clarity due to their unique format. The tri-merged report is a better alternative for credit repair purposes because it is made easy reading, and incorporates all three credit reports. Joining our service will provide you a link to the best, low-cost tri-merged report available.&nbsp;</p>
                <strong>$59
                    <span>month</span>
                </strong>
                <span class="r-span-1">are you ready to take action?</span>
                <span class="r-span-2">Pro Credit Report Analysis, Credit Bureau Disputes, Credit Rebuilding Help, and More!</span>',

            ],

            [
                'url' => 'a-little-history',
                'category' => 2,
                'title' =>'A Little History',
                'sub_content'=>'In the 1950s the FICO credit-scoring model was created by two Stanford University researchers, Bill Fair and Earl Isaac. In 1989, the automated FICO scores were first availed and used by the credit card issuers.',
                'content'=>'<p>In the 1950s the FICO credit-scoring model was created by two Stanford University researchers, Bill Fair and Earl Isaac. In 1989, the automated FICO scores were first availed and used by the credit card issuers. In 1995, credit scores became part of everyday financing when Fannie Mae and Freddie Mac, the mortgage giants, asked creditors to include the use of FICO credit scores in their approval decisions. Fair Isaac Corporation reported a revenue of over $881 million dollars in the year 2016, and trades on the New York Stock Exchange under the Symbol FIC. </p>',

            ],

            [
                'url' => 'fico-and-credit-repair',
                'category' => 2,
                'title' =>'FICO and Credit Repair',
                'sub_content'=>'To successfully carry out a credit repair, we must have knowledge of Fair Isaac&rsquo;s FICO scoring model. We must consider....',
                'content'=>'<p>To successfully carry out a credit repair, we must have knowledge of Fair Isaac&rsquo;s FICO scoring model. We must consider the potential impact on the all-important FICO score before credit repair strategies are implemented. </p>',

            ],

            [
                'url' => 'fair-credit-reporting-act-facts',
                'category' => 2,
                'title' =>'Fair Credit Reporting Act Facts',
                'sub_content'=>'The FICO score is the only credit score that matters in the world. Creditors make their lending decisions based on FICO scores they purchase from the consumer reporting agencies.',
                'content'=>'<p><strong><span style="font-size:12.0pt;line-height:107%;font-family:\'Times New Roman\',\'serif\';">The One That Matters</span></strong></p><p>The FICO score is the only credit score that matters in the world. Creditors make their lending decisions based on FICO scores they purchase from the consumer reporting agencies. Strangely, these are not the same scores that the consumer reporting agencies sell to consumers. Below is a summary of the mixed world of credit scores. </p><p><strong><span style="font-size:12.0pt;line-height:107%;font-family:\'Times New Roman\',\'serif\';">The Credit Organizations, FICO, Lenders, and You</span></strong></p><p>The consumer data used to calculate credit scores is maintained by the consumer reporting agencies. The FICO scoring model is owned by Fair Isaac Corporation and its licenses its use to the consumer reporting agencies. The scoring model is applied to consumer data by the consumer reporting agencies, and the resulting FICO scores are sold to creditors. Apart from Equifax, the other credit bureaus or consumer reporting agencies do not sell FICO scores to consumers. Instead, the proprietary scores made by them are what they sell to consumers.&nbsp;</p>
                <p>The VantageScore is what Experian, TransUnion and Equifax call their &ldquo;first tri-bureau credit score&rdquo;. Unfortunately, there is very little correlation between the VantageScore and the real FICO score, as their difference often ranges by up to 100 points. Due to this great variation, VantageScore has little use and reliability in tracking your credit repair progress. It can be disappointing for consumer who make loan applications or otherwise apply for financing in reliance on their VantageScore, to find out that their FICO scores are far lower. </p>',

            ],

            [
                'url' => 'how-to-get-fico-scores-it-quite-a-task',
                'category' => 2,
                'title' =>'How to Get FICO Scores - It\'s quite a task',
                'sub_content'=>'Consumer can purchase their FICO scores by visiting MyFico.com, which is owned by Fair Isaac Corporation.',
                'content'=>'<p>Consumer can purchase their FICO scores by visiting MyFico.com, which is owned by Fair Isaac Corporation. Equifax FICO score can now be purchased from Equifax.com also. Unless you are friendly with a mortgage broker or an auto finance manager, you will not be able to access to all three of your credit scores to either benchmark your credit repair progress, or to preview your scores before applying for a loan. </p>',

            ],

            [
                'url' => 'a-note-about-score-differences',
                'category' => 2,
                'title' =>'A Note about Score Differences',
                'sub_content'=>'All three FICO scores might differ across Experian, Equifax, and, TransUnion, and these are the three reasons why it is so.',
                'content'=>'<p>All three FICO scores might differ across Experian, Equifax, and, TransUnion, and these are the three reasons why it is so. </p><ol><li>Many creditors do not report to all three consumer reporting agencies; </li><li>The consumer reporting agencies process creditor information at different times; </li><li>Fair Isaac modifies the software on a timely basis, but the consumer reporting agencies do not all implement the new version at the same time. </li></ol><p>Therefore, in any credit repair effort, it is essential to examine and address each reporting agencies independently. </p>',

            ],

            [
                'url' => 'understanding-fico-credit-scores',
                'category' => 2,
                'title' =>'Understanding FICO Credit Scores',
                'sub_content'=>'Understanding the FICO scoring model helps you embark on your credit repair exploits. Your FICO score is a predictive model created to measure the likelihood of you defaulting on your obligations.',
                'content'=>'<p><strong><span style="font-size:12.0pt;line-height:107%;font-family:\'Times New Roman\',\'serif\';">Getting into the Spirit </span></strong></p><p>Understanding the FICO scoring model helps you embark on your credit repair exploits. Your FICO score is a predictive model created to measure the likelihood of you defaulting on your obligations. Some of the factors considered by FICO in its calculations make complete sense, but others may surprise you. Below are insights that can help your credit repair effort. </p><p><strong><span style="font-size:12.0pt;line-height:107%;font-family:\'Times New Roman\',\'serif\';">Inquiries</span></strong></p><p>Your scores will plunge slightly when you apply for new credit. FICO sees shopping for new credit cards, loans or otherwise financing as a likely debt, and a possible danger to your budget, which as a result lowers your credit score. </p><p><strong><span style="font-size:12.0pt;line-height:107%;font-family:\'Times New Roman\',\'serif\';">New Accounts</span></strong></p><p>New accounts put a major, but short-term damage in your credit repair progress. FICO sees a new account as a fresh risk. If you demonstrate that you can manage a new debt well, the impact on you credit score will diminish. </p><p><strong><span style="font-size:12.0pt;line-height:107%;font-family:\'Times New Roman\',\'serif\';">Revolving Balances</span></strong></p><p>Financial stress can result from increased revolving balances. In these situations, FICO will reduce your scores to warn creditors that it may be the wrong time to lend you money. One thing that can give FICO the signal to boost your scores and tell creditors to lend you money is low balances.&nbsp; </p><p><strong><span style="font-size:12.0pt;line-height:107%;font-family:\'Times New Roman\',\'serif\';">Consumer Debt</span></strong></p><p>Store credit cards (aka charge cards) and financing used to purchase furniture and electronics make up consumer debt. FICO is biased against these types of debt. This is attributed to the fact that they are always expensive and may include a no-payment alternative that will grow into an unstable repayment plan after a fixed period. </p><p><strong><span style="font-size:12.0pt;line-height:107%;font-family:\'Times New Roman\',\'serif\';">Active vs. Inactive Accounts</span></strong></p><p>Diminishes score value is the main attribute of an inactive account with zero balance. FICO knows that credit cards retired by both consumers and creditors continue to report. Keep your balances low, but maintain some level of activity on the cards to increase your credit score. </p>',

            ],

            [
                'url' => 'fair-credit-reporting-act-facts',
                'category' => 2,
                'title' =>'Fair Credit Reporting Act Facts',
                'sub_content'=>'The legislation that governs the consumer reporting agencies is the Fair Credit Reporting Act (FCRA) it was originally passed in 1970, and is enforced by the U.S. Federal Trade Commission (FTC), and the Consumer Financial Protection Bureau.',
                'content'=>'<p>The legislation that governs the consumer reporting agencies is the Fair Credit Reporting Act (FCRA) it was originally passed in 1970, and is enforced by the U.S. Federal Trade Commission (FTC), and the Consumer Financial Protection Bureau. It provides rules for furnishers like creditors, and collectors that report credit information, as well as parties that post public records to consumer reporting agencies. Section 611 of the FCRA contains some of the most essential provisions for credit repair purposes. </p><p><strong><span style="font-size:12.0pt;line-height:107%;font-family:\'Times New Roman\',\'serif\';">Here is a sample:</span></strong></p><p>611(a)(1)(A) In general. Subject to subsection (f), if the completeness or accuracy of any item of information contained in a consumer&rsquo;s file at a consumer reporting agency is disputed by the consumer and the consumer notifies the agency directly, or indirectly through a reseller, of such dispute, the agency shall, free of charge, conduct a reasonable reinvestigation to determine whether the disputed information is inaccurate and record the current status of the disputed information, or delete the item from a file in accordance with paragraph (5), before the end of the 30-day period beginning on the date on which the agency receives the notice of the dispute from the consumer or reseller.&nbsp;</p>
                <p>The FCRA provides a great solution against identify theft and other methods of fraud prevention, including giving fraud notifications, which is separate and apart from dispute under FCRA section 611. These tools, if used properly, can play an essential role in the credit repair process. </p>',

            ],

            [
                'url' => 'ftc-ctaff-opinion-letters',
                'category' => 2,
                'title' =>'FTC Staff Opinion Letters',
                'sub_content'=>'FTC issues opinion letters to the FCRA Staff. These letters are not made to be part of the FRCRA, and technically they are not binding. The consumer credit reporting agencies, however, use them as practical guidance.',
                'content'=>'<p><strong><span style="font-size:12.0pt;line-height:107%;font-family:\'Times New Roman\',\'serif\';">FCRA Guidance </span></strong></p><p>FTC issues opinion letters to the FCRA Staff. These letters are not made to be part of the FRCRA, and technically they are not binding. The consumer credit reporting agencies, however, use them as practical guidance. Genuine and effective credit repair providers should be familiar with these documents.&nbsp;</p>
                <p>Staff Opinion Letters are issued by the FTC. The letters have to do with practical points of the FDCPA. It provides essential credit repair leverage when dealing with debt collectors. </p>
',

            ],

            [
                'url' => 'the-scope-of-the-fdcpa',
                'category' => 2,
                'title' =>'The Scope of the FDCPA',
                'sub_content'=>'Many people who seek credit repair have collection accounts furnished on their credit reports. The manner in which collectors must deal with consumers, and the procedures they must use to process disputes and validate debts are described in the FDCPA.',
                'content'=>'<p>Many people who seek credit repair have collection accounts furnished on their credit reports. The manner in which collectors must deal with consumers, and the procedures they must use to process disputes and validate debts are described in the FDCPA. </p><p>It can be frightening to receive a communication from a debt collector. Knowledge of the FDCPA, however, will give you an edge in dealing the debt collectors, as you will be aware of your rights and their obligations with respect to their collection efforts. </p>',

            ],

            [
                'url' => 'forbidden-conduct',
                'category' => 2,
                'title' =>'Forbidden Conduct',
                'sub_content'=>'A large scope of abusive conducts is forbidden by the FDCPA.....',
                'content'=>'<p>A large scope of abusive conducts is forbidden by the FDCPA. Some qualified collectors operate in compliance of the rules, but many others may and often do not. </p>',

            ],

            [
                'url' => 'practical-highlights',
                'category' => 2,
                'title' =>'Practical Highlights',
                'sub_content'=>'Collectors are not allowed to: Contact you before 8 a.m. and after 9 p.m. FDPCA defines this time as an inconvenient time.',
                'content'=>'<p>Collectors are not allowed to: </p><ul><li><span style="font-size:12.0pt;line-height:107%;font-family:\'Times New Roman\',\'serif\';">Contact you before 8 a.m. and after 9 p.m. FDPCA defines this time as an inconvenient time. </span></li><li><span style="font-size:12.0pt;line-height:107%;font-family:\'Times New Roman\',\'serif\';">Call you at work if they know through you that your employer does not sanction it.</span></li><li><span style="font-size:12.0pt;line-height:107%;font-family:\'Times New Roman\',\'serif\';">Threaten or use offensive language. </span></li><li><span style="font-size:12.0pt;line-height:107%;font-family:\'Times New Roman\',\'serif\';">Call you repeatedly with the intention of scaring you into making payment. </span></li><li><span style="font-size:12.0pt;line-height:107%;font-family:\'Times New Roman\',\'serif\';">Suggest they are affiliated with the government. </span></li><li><span style="font-size:12.0pt;line-height:107%;font-family:\'Times New Roman\',\'serif\';">Suggest that for not paying a debt, you could be arrested. </span></li></ul>',

            ],

            [
                'url' => 'tips-you-can-use',
                'category' => 2,
                'title' =>'Tips You Can use',
                'sub_content'=>'Tell debt collectors that you do not discuss your financial affairs over the telephone if you are contacted by them via phone.',
                'content'=>'<p>Tell debt collectors that you do not discuss your financial affairs over the telephone if you are contacted by them via phone. Such a conversation would not be wise since you do not know them. Your behavior towards them should be polite, but firm, and you should let them know that you will review what they send in writing and respond back to them. You can sent them a debt validation request, which is the next credit repair technique, once you receive their written notice. Send a cease and desist letter to the collector pursuant to FDCPA Section 805. </p>',

            ],

            [
                'url' => 'debt-validation-and-the-fdcpa-fdcpa-section-809',
                'category' => 2,
                'title' =>'Debt Validation and the FDCPA &ndash; FDCPA Section 809',
                'sub_content'=>'Section 809 of the FDCPA states that you have the right to request validation of debt.You have 30 days to request debt validation after receipt of a collection letter.',
                'content'=>'<p>Section 809 of the FDCPA states that you have the right to request validation of debt. </p><p>You have 30 days to request debt validation after receipt of a collection letter. It is strongly advised that you request debt validation even if you have not received a written notice but are otherwise aware of the debt. You should not deal with collectors without proof of a legitimate claim. Without proper documentation, a collector must stop collection efforts and not report the alleged debt to the consumer credit reporting agencies. </p>',

            ],

            [
                'url' => 'understanding-statutes-of-limitation',
                'category' => 2,
                'title' =>'Understanding Statutes of Limitation',
                'sub_content'=>'The period of time during which a debt can be collected through the courts is called statute of limitation (SOL) on debt.',
                'content'=>'<p>The period of time during which a debt can be collected through the courts is called statute of limitation (SOL) on debt. To be successful in credit repair it is essential to understand the SOL. </p>',

            ],

            [
                'url' => 'collectors-and-the-sol',
                'category' => 2,
                'title' =>'Collectors and the SOL',
                'sub_content'=>'There are several ways to address a debt on which the SOL has run out. Let the collector know that you have knowledge of the SOL. ',
                'content'=>'<p>There are several ways to address a debt on which the SOL has run out. </p><ul><li><span style="font-size:12.0pt;line-height:107%;font-family:\'Times New Roman\',\'serif\';">Let the collector know that you have knowledge of the SOL. This will make them negotiate. </span></li><li><span style="font-size:12.0pt;line-height:107%;font-family:\'Times New Roman\',\'serif\';">If you do not want to pay the debt, ignore it until it falls from your credit reports. </span></li><li><span style="font-size:12.0pt;line-height:107%;font-family:\'Times New Roman\',\'serif\';">If you get sued, show up in court, and claim your SOL defense, and the case will be dismissed. </span></li></ul>',

            ],

            [
                'url' => 'worthwhile-sol-facts',
                'category' => 2,
                'title' =>'Worthwhile SOL Facts',
                'sub_content'=>'The SOL varies depending on the type of the debt and the state where it was incurred. To find out the SOL on a specific.....',
                'content'=>'<p>The SOL varies depending on the type of the debt and the state where it was incurred. To find out the SOL on a specific debt you have you can easily find that information online or, if you are in our credit repair program, the research will be done for you. </p><ul><li><span style="font-size:12.0pt;line-height:107%;font-family:\'Times New Roman\',\'serif\';">They have no bearing on reporting time limits. </span></li></ul><span style="font-size:12.0pt;line-height:107%;font-family:\'Times New Roman\',\'serif\';">The date of your initial default on the original debt is when the SOL clock starts to run.&nbsp;&nbsp;</span>',

            ],

            [
                'url' => 'beyond-section-611',
                'category' => 2,
                'title' =>'Beyond Section 611',
                'sub_content'=>'The structure for the credit repair dispute process is included in FCRA Section 611. In addition to the legal guidelines provided by the FCRA,....',
                'content'=>'<p>The structure for the credit repair dispute process is included in FCRA Section 611. In addition to the legal guidelines provided by the FCRA, there are two factors that are important in any credit repair process: common sense and experience. </p>',

            ],

            [
                'url' => 'credit-repair-finesse',
                'category' => 2,
                'title' =>'Credit Repair Finesse',
                'sub_content'=>'The success of any credit repair program can be achieved by applying common sense and experience. Finesse is also required in dealing with the consumer credit reporting agencies.',
                'content'=>'<p>The success of any credit repair program can be achieved by applying common sense and experience. Finesse is also required in dealing with the consumer credit reporting agencies. Genuine feeling and respect for the operational process of the consumer credit reporting agencies is also essential. The departments at the consumer credit reporting agencies that are processing your request should be able to verify whether your dispute letters conform to their legal obligations to conduct an investigation.</p>',

            ],

            [
                'url' => 'smart-and-simple',
                'category' => 2,
                'title' =>'Smart and Simple',
                'sub_content'=>'Clarity and simplicity must be used in preparing an effective credit repair dispute. One must thoroughly understand legal leverage. ',
                'content'=>'<p>Clarity and simplicity must be used in preparing an effective credit repair dispute. One must thoroughly understand legal leverage. </p>',

            ],

            [
                'url' => 'working-around-the-system',
                'category' => 2,
                'title' =>'Working Around the System',
                'sub_content'=>'Patience and perseverance are essential when dealing with the consumer credit reporting agencies. This is because consumer credit reporting agencies often engage in defensive practices to reduce their work load.',
                'content'=>'<p>Patience and perseverance are essential when dealing with the consumer credit reporting agencies. This is because consumer credit reporting agencies often engage in defensive practices to reduce their work load. Dismissive letters claiming &ldquo;frivolous&rdquo; disputes, and demand for extra identification documentation, even when sufficient proof of identity was provided, are some of the defensive tactics used by the consumer credit reporting agencies. </p>',

            ],

            [
                'url' => 'fcra-procedure-request-letters-(aka-method-of-verification)',
                'category' => 2,
                'title' =>'FCRA Procedure Request Letters (aka Method of Verification)',
                'sub_content'=>'Pursuant to the FCRA, if you disagree with an item on your credit report and it was previously verified as accurate by a consumer credit reporting agency, you may request a description....',
                'content'=>'<p>Pursuant to the FCRA, if you disagree with an item on your credit report and it was previously verified as accurate by a consumer credit reporting agency, you may request a description of the procedure used to verify that item. If you are not satisfied and would like to pursue the issue further as part of your credit repair program, then this information will be useful to you. The details of the dispute process, the name, addresses, and telephone numbers of the furnisher that verified the disputed information, must be provided by the consumer credit reporting agencies upon request. This information must be provided within 15 days of receiving the request. See Section 611(a)(6)(B), which states in part &ldquo;<em>As part of, or addition to, the notice under subparagraph (A), a consumer reporting agency shall provide to a consumer in writing before the expiration of the 5-day period referred to in subparagraph (A)&hellip;(iii) a notice that, if requested by the consumer, a description of the procedure used to determine the accuracy and completeness of the information shall be provided to the consumer by the agency, including the business name and address of any furnisher of information contacted in connection with such information and the telephone number of such furnisher, if reasonably available; (7) Description of reinvestigation procedure. A consumer reporting agency shall provide to a consumer a description referred to in paragraph (6)(B)(iii) by not later than 15 days after receiving a request from the consumer for that description.&rdquo;</em></p>
                <p>Implementing a powerful credit repair technique pursuant to the FCRA may be a good idea if you have been a victim of identity theft. </p>',

            ],

            [
                'url' => 'blocking-information',
                'category' => 2,
                'title' =>'Blocking Information',
                'sub_content'=>'If you want to block information as result of identity theft, section 605Bof the FCRA will allow you to do that.',
                'content'=>'<p>If you want to block information as result of identity theft, section 605Bof the FCRA will allow you to do that. You should make sure that mistakes in your report were not caused by merging of files, which is discussed in next section. The rules require that you provide consumer credit reporting agencies with sufficient identification information and/or documentation, a police report describing the incident, proper identification of the subject account(s) and a statement that the account(s) in question are fraudulent. </p>',

            ],

            [
                'url' => 'the-outcome',
                'category' => 2,
                'title' =>'The Outcome',
                'sub_content'=>'The identified items will be blocked within 4 business days after the consumer credit reporting agencies...',
                'content'=>'<p>The identified items will be blocked within 4 business days after the consumer credit reporting agencies receive your request and the required documents. At this point, an investigation will start. </p>',

            ],

            [
                'url' => 'protect-yourself-from-identity-theft',
                'category' => 2,
                'title' =>'Protect Yourself from Identity Theft',
                'sub_content'=>'There are different techniques you can use to protect yourself from identity theft if you have been a victim, of if you feel you may be in future.',
                'content'=>'<p>There are different techniques you can use to protect yourself from identity theft if you have been a victim, of if you feel you may be in future. </p><ul><li><span style="font-size:12.0pt;line-height:107%;font-family:\'Times New Roman\',\'serif\';">Fraud Alerts: The addition of a fraud alert on your credit report is allowed by section 605A of the FCRA. This statement requests that prospective lenders contact your before extending credit. The usual duration of a fraud alert is 90-days. Fraud alerts, however, can be extended for 7-years if one feels that threat will continue. </span></li><li><span style="font-size:12.0pt;line-height:107%;font-family:\'Times New Roman\',\'serif\';">Use of a Monitoring Service: Fraud alerts are not 100% reliable. When processing your loan request, all creditors or lenders will not read beyond your credit score. By adding good monitoring service that will give you email and text massage alerts when there is an activity on your credit report will provide you an additional lawyer of protection against identity theft. </span></li></ul>',

            ],


            [
                'url' => 'fixing-merged-file-errors-(not-identity-theft)',
                'category' => 2,
                'title' =>'Fixing Merged-File Errors (not Identity Theft)',
                'sub_content'=>'<p>&ldquo;File merger error&rdquo; occurs when another person&rsquo;s credit data is merged with yours. The &ldquo;file merger error&rdquo; is a small bug in the credit reporting system. This can result, for instance, in an unknown account... </p>',
                'content'=>'<p>&ldquo;File merger error&rdquo; occurs when another person&rsquo;s credit data is merged with yours. The &ldquo;file merger error&rdquo; is a small bug in the credit reporting system. This can result, for instance, in an unknown account, and mislead one to believe identity theft has taken place. </p>',

            ],

            [
                'url' => 'checking-the-facts',
                'category' => 2,
                'title' =>'Checking the Facts',
                'sub_content'=>'Call the lenders if you find accounts on your credit report that is strange to you. It is likely that you are a victim of a file merger error if you have no record of the account. Credit repair can easily solve such problems.',
                'content'=>'<p>Call the lenders if you find accounts on your credit report that is strange to you. It is likely that you are a victim of a file merger error if you have no record of the account. Credit repair can easily solve such problems. A letter containing the list of inaccurate accounts, and a statement that there is a file merger error on your credit report should be sent to the consumer credit reporting agencies. When compiling your credit report, the consumer credit reporting agencies purposely allow a limited number of non-matching data fields. This results in file merger errors. Data entry errors are harbored because of this flexibility, and this can happen in the normal course of an enterprise.&nbsp;&nbsp;</p>
                <p>Decades ago the U.S. Department of Education had the right to collect overdue student loans for a maximum of six years. The Higher U.S. Department of Education Act of 1991 removed this time restriction on the collection of student loans. This new amendment was retroactive and allowed the collection of student loans that had passed the previous 60-year time limitation. Furthermore, in 1998, federal legislation was passed making it difficult to default on student loans and discharging such debts through bankruptcy. </p>',

            ],


            [
                'url' => 'the-answer-to-student-loan-problem',
                'category' => 2,
                'title' =>'The Answer to Student Loan Problem',
                'sub_content'=>'The answer to your student loan problems are Rehabilitation and Consolidation. These solutions will not only reduce your current interest payments but can also stop collection activity. In effect you will be able to borrow more money if you desire to further your education and/or require further financing. </p>',
                'content'=>'<p>The answer to your student loan problems are Rehabilitation and Consolidation. These solutions will not only reduce your current interest payments but can also stop collection activity. In effect you will be able to borrow more money if you desire to further your education and/or require further financing. No income qualifications are required, as everyone will get equal low-interest rate.&nbsp; </p>',

            ],

            [
                'url' => 'learn-to-rebuild-your-credit-&ndash;-disputes-are-not-enough',
                'category' => 2,
                'title' =>'Learn to Rebuild Your Credit - Disputes Are Not Enough',
                'sub_content'=>'<p>Credit repair produces great results that help to remove errors on a timely basis, but this alone will likely not be enough to increase your credit score. </p>',
                'content'=>'<p>Credit repair produces great results that help to remove errors on a timely basis, but this alone will likely not be enough to increase your credit score. </p>',

            ],


            [
                'url' => 'positive-accounts-are-needed',
                'category' => 2,
                'title' =>'Positive Accounts Are Needed',
                'sub_content'=>'The positive and negative information on your report determines your credit score. Eliminating the negative information and adding positive information will increase your score.',
                'content'=>'<p>The positive and negative information on your report determines your credit score. Eliminating the negative information and adding positive information will increase your score. </p><ul><li><span style="font-size:12.0pt;line-height:107%;font-family:\'Times New Roman\',\'serif\';">Open Accounts Now: In tough times, if you are left with no open credit cards, do not put off the rebuilding phase of your credit repair project because it can take up to 6 months for new account the mature enough to positively reflect on your credit score. </span></li><li><span style="font-size:12.0pt;line-height:107%;font-family:\'Times New Roman\',\'serif\';">Building Credit with Secured Cards: Secured cards are the perfect credit repair tool and they are capable of boosting your credit scores greatly. It is best to keep the balances on your secured cards low (25 percent of the available limit on the card) for credit repair purposes. Getting two new secured cards can raise your credit score by over 100 points in 6 months. This is good if you have no open accounts, and your credit scores are in the 500s. </span></li><li><span style="font-size:12.0pt;line-height:107%;font-family:\'Times New Roman\',\'serif\';">Authorized User&rsquo;s Account: Basically, being an authorized user means you have someone else&rsquo;s card in your name. You are authorized to make purchases with it, but you are not the primary owner of the card and are not responsible for the payment. Signing on as an authorized user can help you build or rebuild you credit like no other method. Depending on the card&rsquo;s age, credit limit and balance, you can add approximately 35 - 75 points to your credit score with each card you are added on as an authorized user. Becoming an authorized user will also affect your credit a lot faster than opening up new credit cards in your name, boosting your score in 30-60 days as opposed to 6 or more months.</span></li><li>Avoid Store Cards: Store cards are not a good choice for rebuilding your credit, but MasterCard, Visa, Discover and American Express are appropriate.&nbsp;</li></ul>
                <p>Joint our credit repair program today and let us help you. Understanding your rights is just the tip of the iceberg. We will also be there to advise and give counsel on solutions and ways to tackle your financial problems. Do not wait until your credit debt blows out of proportion. This is the time to take action. There are various ways to resolve your credit issues and increase your credit scores and you can count on us to assist you in your efforts. No matter how deep in debt you may be, we will help you manage it and succeed while doing so.&nbsp;</p>',

            ],

            [
                'url' => 'worth-the-wait',
                'category' => 2,
                'title' =>'Worth The Wait',
                'sub_content'=>'deally, FICO scores range from 300 to 850. In a short period, with proper credit repair, you can increase your scores.',
                'content'=>'<p>Ideally, FICO scores range from 300 to 850. In a short period, with proper credit repair, you can increase your scores. This comes only with patience and the right attitude, as it is not easy to attain a credit score as high as 800. With the following example of an almost perfect 835 FICO score, you will understand better. </p><ol><li><span style="font-size:12.0pt;line-height:107%;font-family:\'Times New Roman\',\'serif\';">A single mortgage over a period of 5 years. </span></li><li><span style="font-size:12.0pt;line-height:107%;font-family:\'Times New Roman\',\'serif\';">A single car loan over a period of 2 years. </span></li><li><span style="font-size:12.0pt;line-height:107%;font-family:\'Times New Roman\',\'serif\';">No more than 5 credit cards over a period of 2 years with at least 25% of unused credit.</span></li><li>Absolutely no store/shop cards.&nbsp;</li></ol>',

            ],

            [
                'url' => 'unplanned-emergencies',
                'category' => 2,
                'title' =>'Unplanned Emergencies',
                'sub_content'=>'Emergencies demanding financial assistance can come at any time. Keeping this in mind, you should be prepared and have some backup. Having a savings account',
                'content'=>'<p>Emergencies demanding financial assistance can come at any time. Keeping this in mind, you should be prepared and have some backup. Having a savings account is a good way to help in the progress of your credit repairs. </p>',
            ],
            [
                'url' => 'plan-ahead',
                'category' => 2,
                'title' =>'Plan Ahead',
                'sub_content'=>'p>Budgeting is a vital tool in monitoring expenses and thereby preventing overspending. Right before you create a savings plan, it is important ...',
                'content'=>'<p>Budgeting is a vital tool in monitoring expenses and thereby preventing overspending. Right before you create a savings plan, it is important to create a budget so you will not go over and beyond your earning power.&nbsp; </p>',
            ],
            [
                'url' => 'stay-within-your-resources',
                'category' => 2,
                'title' =>'Stay Within Your Resources',
                'sub_content'=>'Create an expense book and list all necessary expenses, such as electric and water bills. You can then add other bills and expenses like grocery shopping, miscellaneous etc. ',
                'content'=>'<p>Create an expense book and list all necessary expenses, such as electric and water bills. You can then add other bills and expenses like grocery shopping, miscellaneous etc. as you go. A good method of saving money is to determine your annual objective and then divide it by twelve to know how much you will need to save each month. You should then add all your expenses, put it side by side with your expected earnings and see if it fits. If it does not, you should try and reduce costs somewhere. </p>',
            ],
            [
                'url' => 'it-puts-a-smile-on-the-face',
                'category' => 2,
                'title' =>'It Puts a Smile on the Face',
                'sub_content'=>'The feeling that you do not owe anyone and all bills are being paid at their appropriate time is one of comfort and peace. ',
                'content'=>'<p>The feeling that you do not owe anyone and all bills are being paid at their appropriate time is one of comfort and peace. Some or our customers have reported having more confidence and a general hope for tomorrow after creating their savings plan. Start saving today by taking a little from your expected earnings to support your credit repair efforts.&nbsp;</p>
                            <p>We know this credit guide seems difficult to attain but you do not need to worry. Really! There are a lot of approaches to credit repair to get that credit score that you need. All you have to do is stay away from incurring more debt and you should be fine. It is not impossible; all it takes is planning and surely you will get it right. </p>',
            ],
            [
                'url' => 'insurance-for-credit-repair',
                'category' => 2,
                'title' =>'Insurance for Credit Repair',
                'sub_content'=>'As soon as you begin making progress in terms of credit repair, there are certain things you need to do...',
                'content'=>'<p>As soon as you begin making progress in terms of credit repair, there are certain things you need to do in order to maintain the progress and positive results in the long-run. </p>',
            ],
            [

                'url' => 'become-a-member-of-a-monitoring-service',
                'category' => 2,
                'title' =>'Become a Member of a Monitoring Service',
                'sub_content'=>'This is by far one of the most important approaches to monitoring and maintaining your credit repair progress.',
                'content'=>'<p>This is by far one of the most important approaches to monitoring and maintaining your credit repair progress. Having a monitoring service gives you the opportunity to be notified of the slightest change in your credit file and on your accounts. Most monitoring services are available at a relatively affordable membership fee or free of cost such as CreditKarma.com This way, you are sure you will not be caught unawares by any change during your credit repair progress. Nothing is perfect and in credit reports mistakes do occur. You should be prepared to see accounts deleted and errors reported on your credit report. This is why becoming a member of a monitoring service is crucial. As a member, you will be notified of any issues and you can take necessary measures to rectify them.&nbsp;</p>
                <p>At Better Credit Services, our goal is to help you find the best methods to improve your credit scores and achieve your credit and financial goals. If you have any questions on how to go about resolving your credit issues and how our program can help, you can reach out to us and we will do our best to help you!&nbsp;&nbsp;</p>',
            ]

        ]);


    }
}



