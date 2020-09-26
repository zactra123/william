<?php

use Illuminate\Database\Seeder;

class AddBankLogosSeeder extends Seeder
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
        
        DB::table('bank_logos')->insert([

            [
                'name'=>'CAPITAL ONE AUTO FINANCE',
                'path'=>'/images/banks_logo/capital-one-auto-finance.jpg'
            ],
            [
                'name'=>'SF Fire Credit Union ',
                'path'=>'/images/banks_logo/sffire_logol.jpeg'
            ],
            [
                'name'=>'Cal State L.A. Federal Credit Union',
                'path'=>'/images/banks_logo/cal_state.png'
            ],
            [
                'name'=>'UMe Credit Union Burbank',
                'path'=>'/images/banks_logo/ume_federal.png'
            ],
            [
                'name'=>'Jared The Galleria Of Jewelry',
                'path'=>'/images/banks_logo/jared.jpg'
            ],
            [
                'name'=>'Quicken Loans',
                'path'=>'/images/banks_logo/quickenloans.jpg'
            ],
            [
                'name'=>'Premier America Credit Union',
                'path'=>'/images/banks_logo/premier-america-credit-union.png'
            ],
            [
                'name'=>'Lendmark Financial Services',
                'path'=>'/images/banks_logo/lend_mark.jpg'
            ],
            [
                'name'=>'Springleaf Financial Services',
                'path'=>'/images/banks_logo/wwwspringleaf.jpg'
            ],
            [
                'name'=>'Finance of America Mortgage',
                'path'=>'/images/banks_logo/finance_america.png'
            ],
            [
                'name'=>'Speedy Cash',
                'path'=>'/images/banks_logo/speedy.png'
            ],
            [
                'name'=>'IC System',
                'path'=>'/images/banks_logo/IC-System-Logo.png'
            ],
            [
                'name'=>'Better Business Bureau',
                'path'=>'/images/banks_logo/the_berure.png'
            ],
            [
                'name'=>'Ad Astra Recovery Services',
                'path'=>'/images/banks_logo/adastrarecoveryservices.jpg'
            ],
            [
                'name'=>'Personify Financial',
                'path'=>'/images/banks_logo/personify.png'
            ],
            [
                'name'=>'LendingPoint Personal Loans',
                'path'=>'/images/banks_logo/lendingpoint.png'
            ],
            [
                'name'=>'E-Central Credit Union',
                'path'=>'/images/banks_logo/ecentral.png'
            ],
            [
                'name'=>'SchoolsFirst FCU',
                'path'=>'/images/banks_logo/SchoolsFirst-FCU_large.png'
            ],
            [
                'name'=>'Premier Members Credit Union',
                'path'=>'/images/banks_logo/premier-members-credit-union.jpg'
            ],
            [
                'name'=>'Ditech Call Center',
                'path'=>'/images/banks_logo/ditech_call_center.jpg'
            ],
            [
                'name'=>'Pasadena Federal Credit Union',
                'path'=>'/images/banks_logo/pasadena_finac.png'
            ],
            [
                'name'=>'Partners Federal Credit Union',
                'path'=>'/images/banks_logo/PartnersFCU-standardlogo-1.jpg'
            ],
            [
                'name'=>'Nations Direct Mortgage',
                'path'=>'/images/banks_logo/Nations-Direct.jpg'
            ],
            [
                'name'=>'Ventura County Credit Union',
                'path'=>'/images/banks_logo/Ventura_2C.jpg'
            ],
            [
                'name'=>'MS Services ',
                'path'=>'/images/banks_logo/ms-serjpgvice.jpg'
            ],
            [
                'name'=>'College Ave Student Loans',
                'path'=>'/images/banks_logo/logo-colleg.jpg'
            ],
            [
                'name'=>'',
                'path'=>'/images/banks_logo/'
            ],
            [
                'name'=>'',
                'path'=>'/images/banks_logo/'
            ],
            [
                'name'=>'Essex Credit Service ',
                'path'=>'/images/banks_logo/Marketplace-Essex-Logo.png'
            ],
            [
                'name'=>'Essex Credit',
                'path'=>'/images/banks_logo/essex-credit_toe.png'
            ],
            [
                'name'=>' North American Savings Bank',
                'path'=>'/images/banks_logo/north_america.png'
            ],
            [
                'name'=>'Kinecta Federal Credit Union',
                'path'=>'/images/banks_logo/kinecta-fcu_logo-converted.gif'
            ],
            [
                'name'=>'Veros Credit',
                'path'=>'/images/banks_logo/veros-logo-big.png '
            ],
            [
                'name'=>'International Rescue Committee',
                'path'=>'/images/banks_logo/International_Rescue_Committee_Logo.png'
            ],
            [
                'name'=>'PNC',
                'path'=>'/images/banks_logo/PNC-Mortgage.jpg'
            ],
            [
                'name'=>'Grandview Financial',
                'path'=>'/images/banks_logo/Grandview.png'
            ],
            [
                'name'=>'Eurobank Ergasias',
                'path'=>'/images/banks_logo/eurobank-ergasias.jpg'
            ],
            [
                'name'=>'ransportation Alliance Bank ',
                'path'=>'/images/banks_logo/TAB-bank-review-logo.png'
            ],
            [
                'name'=>'ExxonMobil',
                'path'=>'/images/banks_logo/ExxonMobil.png'
            ],
            [
                'name'=>'Chevron',
                'path'=>'/images/banks_logo/chevron.png'
            ],
            [
                'name'=>'Alaska USA Federal Credit Union',
                'path'=>'/images/banks_logo/Alaskausa.png'
            ],
            [
                'name'=>'Exeter Auto Finance',
                'path'=>'/images/banks_logo/exeter-finance.png'
            ],
            [
                'name'=>'International Organization for Migration',
                'path'=>'/images/banks_logo/IOM.png'
            ],
            [ 'name'=>'RSI Enterprises',
                'path'=>'/images/banks_logo/remsi.jpeg'
            ],
            [
                'name'=>'GRANT & WEBER',
                'path'=>'/images/banks_logo/grant.png'
            ],
            [
                'name'=>'Jefferson Capital Systems',
                'path'=>'/images/banks_logo/jeferson.jpeg'
            ],
            [
                'name'=>'AmSher',
                'path'=>'/images/banks_logo/amsher.png'
            ],
            [
                'name'=>'Gateway',
                'path'=>'/images/banks_logo/gateway-one-logo.png'
            ],
            [
                'name'=>'Dillard’s Credit Card',
                'path'=>'/images/banks_logo/dillard.jpg'
            ],
            [
                'name'=>'Fremont Bank',
                'path'=>'/images/banks_logo/fermonte.png'
            ],
            [
                'name'=>'Southwest Collection',
                'path'=>'/images/banks_logo/swcollection.png'
            ],
            [
                'name'=>'Universal Credit Services',
                'path'=>'/images/banks_logo/Logo_Univ.jpg'
            ],
            [
                'name'=>'Jaguar Cars',
                'path'=>'/images/banks_logo/Jaguar_2012_logo.png'
            ],
            [
                'name'=>'EECU',
                'path'=>'/images/banks_logo/myeecu.png'
            ],
            [
                'name'=>'A+ Federal Credit Union',
                'path'=>'/images/banks_logo/A+federal.jpg'
            ],
            [
                'name'=>'Aspire FCU',
                'path'=>'/images/banks_logo/ASPIRE.png'
            ],
            [
                'name'=>'First Tech Federal Credit Union',
                'path'=>'/images/banks_logo/first-tech-federal-credit-union.png'
            ],
            [
                'name'=>'Pennsylvania State Employees Credit Union',
                'path'=>'/images/banks_logo/pnnsylvania_state_employees_credit_union.jpg'
            ],
             [
                'name'=>'Axis Bank',
                'path'=>'/images/banks_logo/axis-bank.jpg'
            ],

            [
                'name'=>'Smart Financial Credit Union',
                'path'=>'/images/banks_logo/SFLOGO.jpg'
            ],
            [
                'name'=>'Credit Human',
                'path'=>'/images/banks_logo/credit_human.jpg'
            ],
            [
                'name'=>"People\'s Trust Federal Credit Union",
                'path'=>'/images/banks_logo/peoples_trust_federal_credit_union.jpg'
            ],
            [
                'name'=>'Trustmark',
                'path'=>'/images/banks_logo/trustmark.jpg'
            ],
            [
                'name'=>'Bethpage Federal Credit Union',
                'path'=>'/images/banks_logo/Bethpage-Federal-Credit-Union.png'
            ],
            [
                'name'=>'Lake Michigan Credit Union',
                'path'=>'/images/banks_logo/lake_michigan.png'
            ],
            [
                'name'=>'Genisys Credit Union',
                'path'=>'/images/banks_logo/genisys-credit-union.png'
            ],
            [
                'name'=>'Credit Union 1 Bank',
                'path'=>'/images/banks_logo/credit_union_1.png'
            ],
            [
                'name'=>'Washtenaw Federal Credit Union',
                'path'=>'/images/banks_logo/washtenawfcu.png'
            ],
            [
                'name'=>'Best Egg',
                'path'=>'/images/banks_logo/bestegg_logo.png'
            ],
            [
                'name'=>'Orion Federal Credit Union',
                'path'=>'/images/banks_logo/otion_federal_credit_union.jpg'
            ],
            [
                'name'=>'Upgrade',
                'path'=>'/images/banks_logo/upgrade.jpg'
            ],
            [
                'name'=>'Seven Seventeen Credit Union ',
                'path'=>'/images/banks_logo/SevenSeventeenLogoAside.jpg'
            ],
            [
                'name'=>'Dollar Bank',
                'path'=>'/images/banks_logo/dollar_bank.png'
            ],
            [
                'name'=>'Northwest Bank',
                'path'=>'/images/banks_logo/nwb_logo.jpg'
            ],
            [
                'name'=>'First Midwest Bank',
                'path'=>'/images/banks_logo/first-midwest-og.jpg'
            ],
            [
                'name'=>'S&T Bank',
                'path'=>'/images/banks_logo/s&t.jpg'
            ],
            [
                'name'=>'Wings Financial ',
                'path'=>'/images/banks_logo/Wings.jpg'
            ],
            [
                'name'=>'NASA Federal Credit Union',
                'path'=>'/images/banks_logo/NASA-Federal-Credit-Union.png'
            ],
            [
                'name'=>'ELONA',
                'path'=>'/images/banks_logo/elona.png'
            ],
            [
                'name'=>'Usc Credit Union',
                'path'=>'/images/banks_logo/usc.png'
            ],
            [
                'name'=>'NetCredit',
                'path'=>'/images/banks_logo/NetCredit.png'
            ],
            [
                'name'=>'Amalgamated Bank',
                'path'=>'/images/banks_logo/Amalgamated.png'
            ],
            [
                'name'=>'CMG Financial',
                'path'=>'/images/banks_logo/cmg.png'
            ],
            [
                'name'=>'First Electronic Bank',
                'path'=>'/images/banks_logo/feb-logo-2x.png'
            ],
            [
                'name'=>'Advanta Bank',
                'path'=>'/images/banks_logo/Advanta-logo.jpg'
            ],
            [
                'name'=>'SunTrust',
                'path'=>'/images/banks_logo/SunTrust-auto-loans.png'
            ],
            [
                'name'=>'Royal Business Bank',
                'path'=>'/images/banks_logo/royal_busines.png'
            ],
            [
                'name'=>'BB&T Mortgage',
                'path'=>'/images/banks_logo/BBT_Homejpg'
            ],
            [
                'name'=>'Travel Loan Services',
                'path'=>'/images/banks_logo/travel_loan1.png'
            ],
            [
                'name'=>'CIT Bank',
                'path'=>'/images/banks_logo/CIT-Bank.png'
            ],
            [
                'name'=>'Towne Mortgage',
                'path'=>'/images/banks_logo/town.png'
            ],
            [
                'name'=>'CIG Financial',
                'path'=>'/images/banks_logo/cig.png'
            ],
            [
                'name'=>'W.J. Bradley Mortgage Capital',
                'path'=>'/images/banks_logo/WJB_Mortgage_large.jpg'
            ],
            [
                'name'=>'PrimeLending',
                'path'=>'/images/banks_logo/prime_lending.jpg'
            ],
            [
                'name'=>'Village Mortgage Company',
                'path'=>'/images/banks_logo/village.jpg'
            ],
            [
                'name'=>'Bourns Employees Federal Credit',
                'path'=>'/images/banks_logo/Bourns-logo.jpg'
            ],
            [
                'name'=>'Mega Capital Funding Inc',
                'path'=>'/images/banks_logo/mega.png'
            ],
            [
                'name'=>'Sierra Credit',
                'path'=>'/images/banks_logo/sc-logo.jpg'
            ],
            [
                'name'=>'Genesis FS Credit Cards',
                'path'=>'/images/banks_logo/milestone-gold-mastercard.jpg'
            ],
            [
                'name'=>'ACE Cash Express',
                'path'=>'/images/banks_logo/ace.jpg'
            ],
            [
                'name'=>'California Check Cashing Stores',
                'path'=>'/images/banks_logo/cccslogo300.gif'
            ],
            [
                'name'=>'Check Into Cash',
                'path'=>'/images/banks_logo/check_into_ckashepng'
            ],
            [
                'name'=>'Advance America',
                'path'=>'/images/banks_logo/advance-america-logo.jpg'
            ],
            [
                'name'=>'Check `n Go',
                'path'=>'/images/banks_logo/check_go.png'
            ],
            [
                'name'=>'CashNetUSA',
                'path'=>'/images/banks_logo/cashnetusa-1024x270.png'
            ],
            [
                'name'=>'Loan by Phone',
                'path'=>'/images/banks_logo/loanbyphonecom.jpg'
            ],
            [
                'name'=>'LendUp',
                'path'=>'/images/banks_logo/LendUp_Logo.png'
            ],
            [
                'name'=>'CURO',
                'path'=>'/images/banks_logo/curo-logo.png'
            ],
            [
                'name'=>'Personal Money Network',
                'path'=>'/images/banks_logo/personal.jpg'
            ],
            [
                'name'=>'PLS Lowers Check Cashing',
                'path'=>'/images/banks_logo/pls.jpg'
            ],
            [
                'name'=>'Oportun Personal Loans',
                'path'=>'/images/banks_logo/oportun-personal-loans_toe.jpg'
            ],
            [
                'name'=>'Payday Cash Advance',
                'path'=>'/images/banks_logo/payday.png'
            ],
            [
                'name'=>'Happy Money',
                'path'=>'/images/banks_logo/happy_monye.png'
            ],
            [
                'name'=>'Payoff Inc',
                'path'=>'/images/banks_logo/payoff.jpeg'
            ],

        ]);
    }
}
