<?php

use Illuminate\Database\Seeder;

class BankLogosSeeder extends Seeder
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

        DB::table('bank_logos')->truncate();

        DB::table('bank_logos')->insert([

            [
                'name'=>'Bank of America',
                'path'=>'/images/banks_logo/bank_of_america.jpg'
            ],
            [
                'name'=>'Chase Forgives Canadian',
                'path'=>'/images/banks_logo/chase-forgives-canadian-credit-card.jpg'
            ],
            [
                'name'=>'WELLS FARGO',
                'path'=>'/images/banks_logo/wellsfargo.jpg'
            ],
            [
                'name'=>'City Bank',
                'path'=>'/images/banks_logo/citybank-my.jpg'
            ],
            [
                'name'=>'Discover',
                'path'=>'/images/banks_logo/discover.jpg'
            ],
            [
                'name'=>'USAA Bank',
                'path'=>'/images/banks_logo/usaa_bank.jpg'
            ],
            [
                'name'=>'COMENITY',
                'path'=>'/images/banks_logo/comenity.jpg'
            ],
            [
                'name'=>'Synchrony Bank',
                'path'=>'/images/banks_logo/synchrony-financial-bank.jpg'
            ],
            [
                'name'=>'BMW Financial Services',
                'path'=>'/images/banks_logo/bmw.jpg'
            ],
            [
                'name'=>'Toyota Financial Services',
                'path'=>'/images/banks_logo/toyota.jpg'
            ],
            [
                'name'=>'Ford Motor Credit Insurance',
                'path'=>'/images/banks_logo/ford.png'
            ],
            [
                'name'=>'Capital One',
                'path'=>'/images/banks_logo/capital_one.jpg'
            ],
            [
                'name'=>'American Express',
                'path'=>'/images/banks_logo/American_Express_Pentagram.jpg'
            ],
            [
                'name'=>'Goldman Sachs Partners with Apple on a Game-Changing Credit Card',
                'path'=>'/images/banks_logo/goldmansaches.png'
            ],
            [
                'name'=>'Target REDcard™ Credit Card',
                'path'=>'/images/banks_logo/target-redcard-credit-card.jpg'
            ],
            [
                'name'=>'Macy\'s Credit Card',
                'path'=>'/images/banks_logo/macys.jpg'
            ],
            [
                'name'=>'U.S. Bank',
                'path'=>'/images/banks_logo/usbank.png'
            ],
            [
                'name'=>'Union Bank',
                'path'=>'/images/banks_logo/union-bank-logo-png-transparent.png'
            ],
            [
                'name'=>'BBVA',
                'path'=>'/images/banks_logo/bbva-scaled.jpg'
            ],
            [
                'name'=>'Bank of the West',
                'path'=>'/images/banks_logo/bank_of_west.jpg'
            ],
            [
                'name'=>'MERCEDES-BENZ FINANCIAL SERVICES',
                'path'=>'/images/banks_logo/mercedes.jpeg'
            ],
            [
                'name'=>'Home Depot Credit Card',
                'path'=>'/images/banks_logo/homedepot.jpg'
            ],
            [
                'name'=>'TD Auto Finance',
                'path'=>'/images/banks_logo/TD_Auto_Finance_Logo.jpg'
            ],
            [
                'name'=>'First National Bank of Omaha',
                'path'=>'/images/banks_logo/1_national_bank_of_oma.png'
            ],
            [
                'name'=>'Midland Funding',
                'path'=>'/images/banks_logo/MidlandFunding-Logo.jpg'
            ],
            [
                'name'=>'Enhanced Recovery Company',
                'path'=>'/images/banks_logo/enhanced-recovery-company.png'
            ],
            [
                'name'=>'Portfolio Recovery Associates',
                'path'=>'/images/banks_logo/portfolio-recovery-associates.png'
            ],
            [
                'name'=>'Applied Bank',
                'path'=>'/images/banks_logo/applied_bank.png'
            ],
            [
                'name'=>'Ally Auto',
                'path'=>'/images/banks_logo/ally_auto.png'
            ],
            [
                'name'=>'Prosper Marketplace ',
                'path'=>'/images/banks_logo/prosper.png'
            ],
            [
                'name'=>'YAMAHA FINANCIAL SERVICES',
                'path'=>'/images/banks_logo/Yamaha.jpg'
            ],
            [
                'name'=>'Capital One Auto Finance',
                'path'=>'/images/banks_logo/capital-one-auto.png'
            ],
            [
                'name'=>'Tally Technologies',
                'path'=>'/images/banks_logo/Tally_Technologie.png'
            ],
            [
                'name'=>'Nordstrom Credit Card',
                'path'=>'/images/banks_logo/nordstrom-card.png'
            ],
            [
                'name'=>'Care Credit',
                'path'=>'/images/banks_logo/care_credit.jpg'
            ],
            [
                'name'=>'Lowe\'s Credit Cards',
                'path'=>'/images/banks_logo/lowes-credit-card.jpg'
            ],
            [
                'name'=>'Flagstar Bank',
                'path'=>'/images/banks_logo/flagstarmarket.png'
            ],
            [
                'name'=>'Barclays',
                'path'=>'/images/banks_logo/BAR_Flat_Landscape_1C_.jpg'
            ],
            [
                'name'=>'VOLKSWAGEN CREDIT',
                'path'=>'/images/banks_logo/vw.jpg'
            ],
            [
                'name'=>'Caliber Home Loans',
                'path'=>'/images/banks_logo/caliberhomeloans.jpg'
            ],

            [
                'name'=>'MetLife Home Loans',
                'path'=>'/images/banks_logo/metlife.jpg'
            ],
            [
                'name'=>'Navient Loans',
                'path'=>'/images/banks_logo/navient.png'
            ],
            [
                'name'=>'Sallie Mae',
                'path'=>'/images/banks_logo/SLM.png'
            ],
            [
                'name'=>'SOFI',
                'path'=>'/images/banks_logo/sofi.png'
            ],
            [
                'name'=>' U.S. Department Of Education',
                'path'=>'/images/banks_logo/usaedu.jpg'
            ],
            [
                'name'=>'Citizens Bank',
                'path'=>'/images/banks_logo/cityzen.png'
            ],
            [
                'name'=>'PCN Bank',
                'path'=>'/images/banks_logo/pnc.png'
            ],

            [
                'name'=>'FreedomPlus Personal Loans',
                'path'=>'/images/banks_logo/freedomplus.png'
            ],
            [
                'name'=>'Nelnet Student Loans',
                'path'=>'/images/banks_logo/nelnetstudent.jpg'
            ],
            [
                'name'=>'ATT',
                'path'=>'/images/banks_logo/logo_att_share.png'
            ],
            [
                'name'=>'Charter Communications',
                'path'=>'/images/banks_logo/charter.png'
            ],
            [
                'name'=>'Verizon Cell Phone Deals',
                'path'=>'/images/banks_logo/verizon.jpg'
            ],
            [
                'name'=>'T-Mobile',
                'path'=>'/images/banks_logo/t-mobile.png'
            ],
            [
                'name'=>'America First Credit Union',
                'path'=>'/images/banks_logo/american_first_credit_union.jpg'
            ],
            [
                'name'=>'Desert Financial',
                'path'=>'/images/banks_logo/deseret.png'
            ],
            [
                'name'=>'Merrick Bank',
                'path'=>'/images/banks_logo/merrick_bank.jpg'
            ],
            [
                'name'=>'MS Services',
                'path'=>'/images/banks_logo/msservice.jpg'
            ],
            [
                'name'=>'OneMain Financial Personal Loans',
                'path'=>'/images/banks_logo/one-main-financial-review.png'
            ],
            [
                'name'=>'Paid In Ful',
                'path'=>'/images/banks_logo/pif_logo_final.jpg'
            ],
            [
                'name'=>'Bloomingdale\'s American Express',
                'path'=>'/images/banks_logo/bloomingdales-american-express_toe.png'
            ],
            [
                'name'=>'Freedom Mortgage',
                'path'=>'/images/banks_logo/Freedom_Mortgage.jpg'
            ],
            [
                'name'=>'Rushmore Loan Management Services',
                'path'=>'/images/banks_logo/rushmore.png'
            ],
            [
                'name'=>'UNITED WHOLESALE MORTGAGE',
                'path'=>'/images/banks_logo/uniteadewholesale.png'
            ],
            [
                'name'=>'Wells Fargo Mortgage',
                'path'=>'/images/banks_logo/wfh.jpg'
            ],
            [
                'name'=>'Best Buy Credit Card',
                'path'=>'/images/banks_logo/Best-Buy-Credit-Card.png'
            ],
            [
                'name'=>'Chase Auto Refinance',
                'path'=>'/images/banks_logo/chase-auto-refinance_toe.png'
            ],
            [
                'name'=>'sears',
                'path'=>'/images/banks_logo/sears-credit-card-2021.jpg'
            ],
            [
                'name'=>'Chrysler Capital Decal',
                'path'=>'/images/banks_logo/chrysler.png'
            ],
            [
                'name'=>'CREDIT ONE BANK',
                'path'=>'/images/banks_logo/credit_one.png'
            ],
            [
                'name'=>'Dovenmuehle Mortgage',
                'path'=>'/images/banks_logo/dovenmuehle_mortgage.png'
            ],
            [
                'name'=>'CITI MORTGAGE',
                'path'=>'/images/banks_logo/citimortgage.jpg'
            ],
            [
                'name'=>'Bank of Stockton',
                'path'=>'/images/banks_logo/stockton.jpg'
            ],
            [
                'name'=>'Shellpoint Mortgage Servicing',
                'path'=>'/images/banks_logo/shelpoint.png'
            ],
            [
                'name'=>'Select Portfolio Servicing',
                'path'=>'/images/banks_logo/SPS.jpg'
            ],
            [
                'name'=>'Xceed Financial Credit Union',
                'path'=>'/images/banks_logo/xceed.jpg'
            ],
            [
                'name'=>'GS Bank - Crunchbase Company Profile & Funding',
                'path'=>'/images/banks_logo/gsbank.png'
            ],
            [
                'name'=>'KIA FINANCE',
                'path'=>'/images/banks_logo/kmf.png'
            ],
            [
                'name'=>'First Premier Bank Credit Card',
                'path'=>'/images/banks_logo/First-Premier-Bank-Credit-Card.png'
            ],
            [
                'name'=>'Glendale Area Schools Credit Union',
                'path'=>'/images/banks_logo/glendelarea.jpg'
            ],
            [
                'name'=>'Medallion Bank',
                'path'=>'/images/banks_logo/medallion_bank.jpg'
            ],
            [
                'name'=>'Cavalry Portfolio Services',
                'path'=>'/images/banks_logo/cavalry-portfolio-services-newswire-thumb.jpg'
            ],
            [
                'name'=>'Infiniti Financial Services',
                'path'=>'/images/banks_logo/infinity.jpg'
            ],
            [
                'name'=>'PHH Mortgage',
                'path'=>'/images/banks_logo/phh-mortgage-vector-logo.png'
            ],
            [
                'name'=>'Plaza Home Mortgage Inc',
                'path'=>'/images/banks_logo/Plaza_Home_Mortgage_Inc.jpg'
            ],
            [
                'name'=>'RentTrack',
                'path'=>'/images/banks_logo/renttrack.png'
            ],
            [
                'name'=>'Gateway Auto Finance',
                'path'=>'/images/banks_logo/getwayauto.png'
            ],
            [
                'name'=>'Ollo Card Services',
                'path'=>'/images/banks_logo/ollo-platinum-bigger.png'
            ],
            [
                'name'=>'Clearpath Federal Credit Union',
                'path'=>'/images/banks_logo/clesarpath_large.jpg'
            ],
            [
                'name'=>'California Credit Union',
                'path'=>'/images/banks_logo/california.jpg'
            ],
            [
                'name'=>'First Entertainment Credit Union',
                'path'=>'/images/banks_logo/First_Entertainment_Credit_Union_logo.png'
            ],
            [
                'name'=>'Fifth Third Bank',
                'path'=>'/images/banks_logo/fifth_third_bank.jpg'
            ],
            [
                'name'=>'Land Rover Financial Services',
                'path'=>'/images/banks_logo/land_rover.jpg'
            ],
            [
                'name'=>'Nissan Motor Acceptance Corporation',
                'path'=>'/images/banks_logo/Nissan-Motor-Acceptance-Corporation.jpg'
            ],
            [
                'name'=>'General Motors Financial Company',
                'path'=>'/images/banks_logo/gmf-banner.png'
            ],
            [
                'name'=>'Bank of Hawaii',
                'path'=>'/images/banks_logo/bank_hawaii.png'
            ],
            [
                'name'=>'Westlake Financia',
                'path'=>'/images/banks_logo/Westlake-Financial-Logo-Standard-Color.jpg'
            ],
            [
                'name'=>'CURACAO',
                'path'=>'/images/banks_logo/curacao-logo-553x260-v1.png'
            ],
            [
                'name'=>'Home Point Financial Corporation',
                'path'=>'/images/banks_logo/home_point.jpg'
            ],
            [
                'name'=>'Nations Direct Mortgage',
                'path'=>'/images/banks_logo/Nations-Direct-Logo_1000px.jpg'
            ],
            [
                'name'=>'Pentagon Federal Credit Union',
                'path'=>'/images/banks_logo/penfed.jpg'
            ],
            [
                'name'=>'Kroger REWARDS World Mastercard',
                'path'=>'/images/banks_logo/rewards-credit-card.png'
            ],
            [
                'name'=>'LoanCare',
                'path'=>'/images/banks_logo/LC_Logo_RGB_2018_Tagline.png'
            ],
            [
                'name'=>'CENLAR FSB',
                'path'=>'/images/banks_logo/cenlar-fsb.jpg'
            ],
            [
                'name'=>'Kabbage',
                'path'=>'/images/banks_logo/kabbage_logo_horizontal_reverse.jpg'
            ],
            [
                'name'=>'On Desk',
                'path'=>'/images/banks_logo/onDesk.jpg'
            ],
            [
                'name'=>'Santander Mobile Banking',
                'path'=>'/images/banks_logo/santander.png'
            ],
            [
                'name'=>'',
                'path'=>'/images/banks_logo/'
            ],
            [
                'name'=>'Lightning Fast Finance',
                'path'=>'/images/banks_logo/lightning.png'
            ],
            [
                'name'=>'Mr. Cooper Mortgage ',
                'path'=>'/images/banks_logo/mr_cooper_logo.png'
            ],
            [
                'name'=>'TCF Financial Corporation',
                'path'=>'/images/banks_logo/TCF_Bank_logo_vert-CMYK.jpg'
            ],

            [
                'name'=>'First Citizens Bank',
                'path'=>'/images/banks_logo/FCB-logo-01-960x557.png'
            ],

            [
                'name'=>'Comerica Bank',
                'path'=>'/images/banks_logo/comerica-2.jpg'
            ],

            [
                'name'=>'HSBC Bank',
                'path'=>'/images/banks_logo/hsbc-1024x1024.jpg'
            ],

            [
                'name'=>'Barneys New York Credit Card',
                'path'=>'/images/banks_logo/barneys.jpg'
            ],

            [
                'name'=>'Logix Federal Credit Union ',
                'path'=>'/images/banks_logo/logix-federal-credit-union.jpg'
            ],

            [
                'name'=>'The Bank of Missouri',
                'path'=>'/images/banks_logo/bank_of_missouri_1617.jpeg'
            ],

            [
                'name'=>'Seneca Mortgage Servicing LLC',
                'path'=>'/images/banks_logo/seneca.png'
            ],

            [
                'name'=>'AmWest Funding Korea',
                'path'=>'/images/banks_logo/amwest.png'
            ],

            [
                'name'=>'Elan Financial Services',
                'path'=>'/images/banks_logo/elan_logo.jpg'
            ],

            [
                'name'=>'Credit First National Association',
                'path'=>'/images/banks_logo/credit-first-national-association_logo_3401_widget_logo.png'
            ],

            [
                'name'=>'Nationwide Mutual Insurance Company',
                'path'=>'/images/banks_logo/nationwide.png'
            ],

            [
                'name'=>'Harley Davidson',
                'path'=>'/images/banks_logo/Harley-Davidson_logo.png'
            ],

            [
                'name'=>'Robbins Brothers',
                'path'=>'/images/banks_logo/RBnewLogo.png'
            ],

            [
                'name'=>'State Farm Mutual Automobile Insurance',
                'path'=>'/images/banks_logo/state_farm.jpg'
            ],

            [
                'name'=>'FedLoan Servicing',
                'path'=>'/images/banks_logo/fed-loan-servicing-featured-image.png'
            ],

            [
                'name'=>'Bellco Credit Union Auto Loans',
                'path'=>'/images/banks_logo/Bellco-CU-Auto-Loans.jpg'
            ],

            [
                'name'=>'First Electronic Bank',
                'path'=>'/images/banks_logo/first_electronic.png'
            ],

            [
                'name'=>'Hyundai Finance Solutions',
                'path'=>'/images/banks_logo/hmf.png'
            ],

            [
                'name'=>'First Community Bank',
                'path'=>'/images/banks_logo/first_comunity.png'
            ],

            [
                'name'=>'US Bank Home Mortgage',
                'path'=>'/images/banks_logo/usbankmortgage.jpg'
            ],

            [
                'name'=>'TD Auto Finance',
                'path'=>'/images/banks_logo/td-auto-finance.jpg'
            ],
            [
                'name'=>'loanDepot',
                'path'=>'/images/banks_logo/2017loanDepotLogo.jpg'
            ],

            [
                'name'=>'LVNV Funding',
                'path'=>'/images/banks_logo/lvnv-logo-light.png'
            ],
            [
                'name'=>'Navy Federal Credit Union',
                'path'=>'/images/banks_logo/navy-federal-credit-union-free-everyday.jpg'
            ],

            [
                'name'=>'Digital Federal Credit Union',
                'path'=>'/images/banks_logo/dcu.jpg'
            ],
            [
                'name'=>'Commerce Bank',
                'path'=>'/images/banks_logo/commerce-bank.jpg'
            ],

            [
                'name'=>'Umpqua Bank',
                'path'=>'/images/banks_logo/umpqua.png'
            ],
            [
                'name'=>'Direct Loan Servicing Center',
                'path'=>'/images/banks_logo/direct_loan.jpg'
            ],

            [
                'name'=>'Edfinancial Services',
                'path'=>'/images/banks_logo/Edfinancial.jpg'
            ],
            [
                'name'=>'First Mutual Finance',
                'path'=>'/images/banks_logo/First_Mutual_Finance.jpg'
            ],

            [
                'name'=>'GreenSky',
                'path'=>'/images/banks_logo/GS-LOGO.jpg'
            ],
            [
                'name'=>'NBT Bank',
                'path'=>'/images/banks_logo/NBT_Bank_logo.png'
            ],

            [
                'name'=>'WebBank Announces',
                'path'=>'/images/banks_logo/webbank-final-logo.jpg'
            ],
            [
                'name'=>'LendingPoint',
                'path'=>'/images/banks_logo/LendingPoint.jpg'
            ],

            [
                'name'=>'LightStream A Division Of Truist',
                'path'=>'/images/banks_logo/lightstream.png'
            ],
            [
                'name'=>'Lending Club',
                'path'=>'/images/banks_logo/LC-Logo.png'
            ],

            [
                'name'=>'Ocwen Loan Servicing Mortgage',
                'path'=>'/images/banks_logo/Ocwen+Loan+Servicing.png'
            ],
            [
                'name'=>'Rushmore Loan Management Services',
                'path'=>'/images/banks_logo/rushmore (1).png'
            ],

            [
                'name'=>'BSI Financial Services',
                'path'=>'/images/banks_logo/bsi-financial-services_logo.png'
            ],
            [
                'name'=>'First Hawaiian Bank',
                'path'=>'/images/banks_logo/first_hawaii.png'
            ],

            [
                'name'=>'Progressive Management System',
                'path'=>'/images/banks_logo/progresive_mengment.png'
            ],
            [
                'name'=>'Petal Visa Credit Card',
                'path'=>'/images/banks_logo/petal-cash-back-card.png'
            ],

            [
                'name'=>'TruMark Financial',
                'path'=>'/images/banks_logo/TruMark.png'
            ],
            [
                'name'=>'Barclaycard Arrival Plus Cards Being Converted to Mercury Mastercard',
                'path'=>'/images/banks_logo/CreditShop-Mercury-Mastercard.png'
            ],

            [
                'name'=>'American Heritage Credit Union',
                'path'=>'/images/banks_logo/american_heating.png'
            ],
            [
                'name'=>'1st Financial Bank Usa',
                'path'=>'/images/banks_logo/1st-financial-bank-usa.jpg'
            ],

            [
                'name'=>'Wyndham Vacation Ownership',
                'path'=>'/images/banks_logo/Wyndham.jpg'
            ],
            [
                'name'=>'M&T Bank Money Market Account ',
                'path'=>'/images/banks_logo/manufacturers-and-traders-trust-company-money-market_toe.png'
            ],

            [
                'name'=>'Vantage West Credit Union',
                'path'=>'/images/banks_logo/Vantage.jpg'
            ],
            [
                'name'=>'Credit Union West',
                'path'=>'/images/banks_logo/credit_union_west.png'
            ],

            [
                'name'=>'Alphera Financial Services',
                'path'=>'/images/banks_logo/alphera.jpg'
            ],
            [
                'name'=>'TruWest Credit Union',
                'path'=>'/images/banks_logo/truwest.png'
            ],

            [
                'name'=>'Mechanics Bank',
                'path'=>'/images/banks_logo/Merged_Mechanics_t670.png'
            ],
            [
                'name'=>' Huntington Bancshares Incorporated',
                'path'=>'/images/banks_logo/Huntington_Logo_2C.jpg'
            ],

            [
                'name'=>'Media City Community Credit Union',
                'path'=>'/images/banks_logo/media.jpg'
            ],
            [
                'name'=>'First Horizon National Corporation',
                'path'=>'/images/banks_logo/first-horizon-2019.jpg'
            ],

            [
                'name'=>'Southland Credit Union',
                'path'=>'/images/banks_logo/southlamd.jpg'
            ],
            [
                'name'=>'TALBOTS CLASSIC AWARDS',
                'path'=>'/images/banks_logo/talbotsa.jpg'
            ],

            [
                'name'=>'CACH',
                'path'=>'/images/banks_logo/cach-logo-light.png'
            ],
            [
                'name'=>'Gain Federal Credit Union',
                'path'=>'/images/banks_logo/Gain_Logo_2c_FCU_Bottom_Web.png'
            ],

            [
                'name'=>'City National Bank',
                'path'=>'/images/banks_logo/cnb-tile-icon.png'
            ],
            [
                'name'=>'Pacific Union Financial',
                'path'=>'/images/banks_logo/pacific-union-financial-squarelogo.png'
            ],

            [
                'name'=>'HomeBridge Financial Services Mortgage',
                'path'=>'/images/banks_logo/home-bridge.jpg'
            ],
            [
                'name'=>'Lead Bank',
                'path'=>'/images/banks_logo/lead.png'
            ],

            [
                'name'=>'Major Financial Services ',
                'path'=>'/images/banks_logo/major.png'
            ],

            [
                'name'=>' Veros Credit',
                'path'=>'/images/banks_logo/veros-logo-big.png'
            ],

            [
                'name'=>'San Diego County Credit Union',
                'path'=>'/images/banks_logo/SDCCU-Logo.png'
            ],

            [
                'name'=>'BMO Harris Bank',
                'path'=>'/images/banks_logo/BMOHarrisBank.jpg'
            ],

            [
                'name'=>'PennyMac Loan Services',
                'path'=>'/images/banks_logo/pennymacusa.png'
            ],

            [
                'name'=>'EasyPay Finance',
                'path'=>'/images/banks_logo/esaypay.png'
            ],

            [
                'name'=>'Avant Loan',
                'path'=>'/images/banks_logo/Avant.png'
            ],

            [
                'name'=>'Guild Mortgage Company',
                'path'=>'/images/banks_logo/Guild_Logo_RGB_Full.png'
            ],

            [
                'name'=>'Canvas Credit Union',
                'path'=>'/images/banks_logo/canvas_horizontal_color.png'
            ],

            [
                'name'=>'Lamborghini Financial Services',
                'path'=>'/images/banks_logo/Lamborghini.png'
            ],

            [
                'name'=>'Bentley',
                'path'=>'/images/banks_logo/bentley.jpg'
            ],

            [
                'name'=>'East West Bank',
                'path'=>'/images/banks_logo/East_West_Bank.png'
            ],

            [
                'name'=>'LendingUSA',
                'path'=>'/images/banks_logo/LendingUSA.jpg'
            ],

            [
                'name'=>'Tourneau',
                'path'=>'/images/banks_logo/tourneau-logo.jpg'
            ],

            [
                'name'=>'Cartier',
                'path'=>'/images/banks_logo/Cartier-Logo.png'
            ],


            [
                'name'=>'AmeriHome Mortgage Company',
                'path'=>'/images/banks_logo/amerihome.png'
            ],


            [
                'name'=>'Citizens One Home',
                'path'=>'/images/banks_logo/cityzenone.jpg'
            ],


            [
                'name'=>'TMS Strikes AmeriSave',
                'path'=>'/images/banks_logo/TMS_AMC-1.png'
            ],
            [
                'name'=>'Lexus Financial Services',
                'path'=>'/images/banks_logo/lexus-financial-services.png'
            ],

            [
                'name'=>'World Relief',
                'path'=>'/images/banks_logo/worldrelief.png'
            ],
            [
                'name'=>'PHH Mortgage',
                'path'=>'/images/banks_logo/phh-mortgage-vector-logo (1).png'
            ],

            [
                'name'=>'Safe1Credit Union',
                'path'=>'/images/banks_logo/safe1credit.png'
            ],

            [
                'name'=>'Security Service Federal Credit Union',
                'path'=>'/images/banks_logo/SecurityServicFederalCreditUnion.png'
            ],

            [
                'name'=>'Students Loan Trust Fund ',
                'path'=>'/images/banks_logo/studentloans.jpg'
            ],
            [
                'name'=>'',
                'path'=>'/images/banks_logo/'
            ],
            [
                'name'=>'Cathay Bank',
                'path'=>'/images/banks_logo/cathaybanklogo.jpg'
            ],
            [
                'name'=>'UNIFY Financial Credit Union',
                'path'=>'/images/banks_logo/Unify_Logo_Horizontal_WhiteType_CMYK.png'
            ],
            [
                'name'=>'Volvo Car Financial Services',
                'path'=>'/images/banks_logo/VCFS-logo-FullColor.png'
            ],
            [
                'name'=>'Freedom Road Financial',
                'path'=>'/images/banks_logo/freedomroad.jpg'
            ],
            [
                'name'=>'BB&T Bank',
                'path'=>'/images/banks_logo/BBT-Bank-Logo.jpg'
            ],

            [
                'name'=>'First City Credit Union',
                'path'=>'/images/banks_logo/FirstCityCreditUnion.png'
            ],

            [
                'name'=>'Franklin American Mortgage Company',
                'path'=>'/images/banks_logo/FAMCLOGO.png'
            ],

            [
                'name'=>'First Savings Credit Card',
                'path'=>'/images/banks_logo/FSCC-image2.png'
            ],

            [
                'name'=>'Coastway',
                'path'=>'/images/banks_logo/coastway.jpg'
            ],

            [
                'name'=>'Bayview Loan',
                'path'=>'/images/banks_logo/bls-logo-blue.png'
            ],

            [
                'name'=>'Wilshire Consumer Credit Auto Finance',
                'path'=>'/images/banks_logo/wilshire-consumer-credit_toe.jpg'
            ],

            [
                'name'=>'First Data Corporation',
                'path'=>'/images/banks_logo/firstdata.png'
            ],

            [
                'name'=>'Seterus',
                'path'=>'/images/banks_logo/seterus.png'
            ],

            [
                'name'=>'Morgan Stanley',
                'path'=>'/images/banks_logo/morgan-stanley-insider-stole.jpg'
            ],

            [
                'name'=>'Truist Securities',
                'path'=>'/images/banks_logo/truist.jpg'
            ],

            [
                'name'=>'BNY Mellon',
                'path'=>'/images/banks_logo/BNY_Mellon.png'
            ],

            [
                'name'=>'Charles Schwab Corporation',
                'path'=>'/images/banks_logo/charles-schwab-logo.jpg'
            ],

            [
                'name'=>'State Street Corporation',
                'path'=>'/images/banks_logo/State-Street.jpg'
            ],

            [
                'name'=>'TIAA Bank',
                'path'=>'/images/banks_logo/tiaa.png'
            ],

            [
                'name'=>'UBS',
                'path'=>'/images/banks_logo/ubs-logo.png'
            ],

            [
                'name'=>'Northern Trust',
                'path'=>'/images/banks_logo/nt.png'
            ],

            [
                'name'=>'KeyCorp',
                'path'=>'/images/banks_logo/KeyCorp.jpg'
            ],

            [
                'name'=>'Ameriprise Financial',
                'path'=>'/images/banks_logo/Ameriprise_Financial_logo.svg.png'
            ],

            [
                'name'=>'Royal Bank of Canada',
                'path'=>'/images/banks_logo/rbc.jpg'
            ],

            [
                'name'=>'Regions Bank',
                'path'=>'/images/banks_logo/REG_color_register.jpg'
            ],

            [
                'name'=>'CREDIT SUISSE',
                'path'=>'/images/banks_logo/suisse.jpg'
            ],

            [
                'name'=>'Deutsche Bank',
                'path'=>'/images/banks_logo/Deutsche.jpg'
            ],

            [
                'name'=>'Silicon Valley Bank',
                'path'=>'/images/banks_logo/svb.jpg'
            ],

            [
                'name'=>'E-Trade Bank',
                'path'=>'/images/banks_logo/etrade.png'
            ],

            [
                'name'=>'PEOPLE\'S UNITED BANK',
                'path'=>'/images/banks_logo/People\'s United Bank Logo-Color.jpg'
            ],

            [
                'name'=>'CIT Bank',
                'path'=>'/images/banks_logo/cit.png'
            ],

            [
                'name'=>'New York Community Bank',
                'path'=>'/images/banks_logo/nyc.png'
            ],

            [
                'name'=>'Popular Bank',
                'path'=>'/images/banks_logo/Popular.png'
            ],

            [
                'name'=>'Synovus',
                'path'=>'/images/banks_logo/synovus_the_bank.jpg'
            ],

            [
                'name'=>'Raymond James',
                'path'=>'/images/banks_logo/Raymond_James.jpg'
            ],

            [
                'name'=>'CIBC Bank',
                'path'=>'/images/banks_logo/CIBC_logo.png'
            ],

            [
                'name'=>'First Horizon National Corporation',
                'path'=>'/images/banks_logo/first-horizon-national-corporation.jpg'
            ],

            [
                'name'=>'BOK FINANCIAL',
                'path'=>'/images/banks_logo/logo_bokf.png'
            ],

            [
                'name'=>'John Deere Financial',
                'path'=>'/images/banks_logo/JDFinancial.png'
            ],

            [
                'name'=>'Valley National Bank',
                'path'=>'/images/banks_logo/vnbjpg.png'
            ],

            [
                'name'=>'Wintrust Financial Corporation',
                'path'=>'/images/banks_logo/winyrust.png'
            ],

            [
                'name'=>'Texas Capital Bank',
                'path'=>'/images/banks_logo/texascapitalbank.jpg'
            ],

            [
                'name'=>'Frost Bank',
                'path'=>'/images/banks_logo/frost-bank.jpg'
            ],

            [
                'name'=>'Associated Bank',
                'path'=>'/images/banks_logo/associeted.jpg'
            ],
            [
                'name'=>'BankUnited',
                'path'=>'/images/banks_logo/BankUnited_Logo-reduced.jpg'
            ],

            [
                'name'=>'IberiaBank Corp',
                'path'=>'/images/banks_logo/IberiaBank-WEB.jpg'
            ],


            [
                'name'=>'Hancock Whitney Bank',
                'path'=>'/images/banks_logo/hancock_whitney_bank_logo_before_after.png'
            ],


            [
                'name'=>'Prosperity Bank',
                'path'=>'/images/banks_logo/prosperity.jpg'
            ],


            [
                'name'=>'Webster',
                'path'=>'/images/banks_logo/webster.jpg'
            ],
            [
                'name'=>'Pinnacle Financial',
                'path'=>'/images/banks_logo/Pinnacle-Financial.png'
            ],
            [
                'name'=>'Western Alliance Bank',
                'path'=>'/images/banks_logo/WAB Logo FDIC Color.png'
            ],
            [
                'name'=>'Commerce Bank',
                'path'=>'/images/banks_logo/2018_CB_Green_342.jpg'
            ],
            [
                'name'=>'Investors Bank',
                'path'=>'/images/banks_logo/investor-bank.jpg'
            ],
            [
                'name'=>'UMB Financial',
                'path'=>'/images/banks_logo/UMB Logo.jpg'
            ],
            [
                'name'=>'PacWests',
                'path'=>'/images/banks_logo/pacific-western.jpg'
            ],
            [
                'name'=>'Stifel Financial',
                'path'=>'/images/banks_logo/stefel.png'
            ],
            [
                'name'=>'Sumitomo Mitsui Financial',
                'path'=>'/images/banks_logo/Mitsui.jpg'
            ],
            [
                'name'=>'MidFirst Bank',
                'path'=>'/images/banks_logo/MidFirst.JPG'
            ],
            [
                'name'=>'Fulton Bank',
                'path'=>'/images/banks_logo/fulton-og-logo.png'
            ],
            [
                'name'=>'Bank SNB',
                'path'=>'/images/banks_logo/simmons-first-national.jpg'
            ],
            [
                'name'=>'Old National Bank',
                'path'=>'/images/banks_logo/Old-National.jpg'
            ],
            [
                'name'=>'Arvest Bank',
                'path'=>'/images/banks_logo/Arvest-Bank-featured-image-2.png'
            ],
            [
                'name'=>'United Bank',
                'path'=>'/images/banks_logo/unitedbankwva_logo.jpg'
            ],
            [
                'name'=>'FirstBank Mobile Banking',
                'path'=>'/images/banks_logo/mobilebanking.png'
            ],
            [
                'name'=>'First Midwest Bank',
                'path'=>'/images/banks_logo/first-midwest-bank.jpg'
            ],
            [
                'name'=>'CenterState Bank',
                'path'=>'/images/banks_logo/center-state.jpg'
            ],
            [
                'name'=>'Ameris Bank',
                'path'=>'/images/banks_logo/Ameris_RGB_HorizontalBrandmark.jpg'
            ],
            [
                'name'=>'Atlantic Union Bank',
                'path'=>'/images/banks_logo/atlanticunionbank.jpg'
            ],
            [
                'name'=>'WaFd Bank',
                'path'=>'/images/banks_logo/wafdbank.png'
            ],
            [
                'name'=>'Cadence Bank',
                'path'=>'/images/banks_logo/CADENCE.jpg'
            ],
            [
                'name'=>'South State Bank',
                'path'=>'/images/banks_logo/ssbm.png'
            ],

            [
                'name'=>'City National Bank',
                'path'=>'/images/banks_logo/cnb.jpg'
            ],

            [
                'name'=>'First Republic Bank',
                'path'=>'/images/banks_logo/First Republic Logo_GKG.jpg'
            ],

            [
                'name'=>'Zions',
                'path'=>'/images/banks_logo/zions-bancorp.jpg'
            ],

            [
                'name'=>'Glacier Bank',
                'path'=>'/images/banks_logo/Glacier.png'
            ],

            [
                'name'=>'Rabobank',
                'path'=>'/images/banks_logo/rabobank_logo.jpg'
            ],

            [
                'name'=>'First Interstate Bank',
                'path'=>'/images/banks_logo/irstinterstatebank.png'
            ],

            [
                'name'=>'Union Bank & Trust',
                'path'=>'/images/banks_logo/ubt.png'
            ],

            [
                'name'=>'Great Southern Bank',
                'path'=>'/images/banks_logo/greatsouthernban.png'
            ],

            [
                'name'=>'BERKSHIRE HATHAWAY INC.',
                'path'=>'/images/banks_logo/berkshirehathaway.png'
            ],
            [
                'name'=>'Great Western Bank',
                'path'=>'/images/banks_logo/greatwesternbank.png'
            ],
            [
                'name'=>'Trustco Bank',
                'path'=>'/images/banks_logo/trustco-bank.png'
            ],
            [
                'name'=>'Columbia Bank',
                'path'=>'/images/banks_logo/columbiabank.png'
            ],
            [
                'name'=>'Carter Bank & Trust',
                'path'=>'/images/banks_logo/cbtcare.png'
            ],
            [
                'name'=>'Centennial Bank',
                'path'=>'/images/banks_logo/centennial-bank.png'
            ],
            [
                'name'=>'First Bank ',
                'path'=>'/images/banks_logo/FB_GenericSocialBG.jpg'
            ],

            [
                'name'=>'Sunflower Bank',
                'path'=>'/images/banks_logo/sunflowers.jpg'
            ],

            [
                'name'=>'Terrabank',
                'path'=>'/images/banks_logo/terrabank_26442.png'
            ],

            [
                'name'=>'Academy Bank',
                'path'=>'/images/banks_logo/academybank.jpg'
            ],
            [
                'name'=>'Celtic Bank',
                'path'=>'/images/banks_logo/celtic.jpg'
            ],
            [
                'name'=>'Amalgamated Bank',
                'path'=>'/images/banks_logo/AmalgamatedBankofChicago_903.jpg'
            ],
            [
                'name'=>'BMW FAMILY',
                'path'=>'/images/banks_logo/bmw_card.jpg'
            ],
            [
                'name'=>'Brinks Home Security',
                'path'=>'/images/banks_logo/Brinks_Home_Security.jpg'
            ],
            [
                'name'=>'First National Visa Credit Card',
                'path'=>'/images/banks_logo/fristnationalcc.jpg'
            ],
            [
                'name'=>'Blaze MasterCard Credit Card',
                'path'=>'/images/banks_logo/blazecard.png'
            ],

            [
                'name'=>'Modern Finance',
                'path'=>'/images/banks_logo/mfinance.png'
            ],
            [
                'name'=>'BSI Financial Services',
                'path'=>'/images/banks_logo/bsi-financial-services.png'
            ],
            [
                'name'=>'Pacific Union Financial ',
                'path'=>'/images/banks_logo/pacific-union-financila.png'
            ],
            [
                'name'=>'Sequoia Financial',
                'path'=>'/images/banks_logo/sequoia.png'
            ],
            [
                'name'=>'Bayview Loan Servicing',
                'path'=>'/images/banks_logo/Bayview.png'
            ],
            [
                'name'=>'Monterey Financial Services',
                'path'=>'/images/banks_logo/montery.png'
            ],
            [
                'name'=>'PennyMac Loan Services',
                'path'=>'/images/banks_logo/pennymacloan.png'
            ],
            [
                'name'=>'Pacific Financial Association',
                'path'=>'/images/banks_logo/Pacific.png'
            ],
            [
                'name'=>'JOMAX RECOVERY SERVICES',
                'path'=>'/images/banks_logo/jomax-recovery-logo.jpg'
            ],
            [
                'name'=>'Credit Control Corporation',
                'path'=>'/images/banks_logo/Credit-Control.png'
            ],
            [
                'name'=>'Frontier Communications',
                'path'=>'/images/banks_logo/Frontier.jpg'
            ],
            [
                'name'=>'Hunter Warfield',
                'path'=>'/images/banks_logo/hunter.png'
            ],

        ]);
    }
}
