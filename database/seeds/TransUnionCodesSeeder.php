<?php

use Illuminate\Database\Seeder;

class TransUnionCodesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trans_union_codes')->truncate();

        DB::table('trans_union_codes')->insert([

            [
                'negative' => true,
                'title' =>"Account Type",
                'code' =>"AG",
                "description" => "Collection Agency/Attorney"
            ],
            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"AL",
                "description" => "Auto Lease"
            ],
            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"AU",
                "description" => "Automobile"
            ],
            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"AX",
                "description" => "Agricultural Loan"
            ],
            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"BC",
                "description" => "Business Credit Card"
            ],
            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"BL",
                "description" => "Revolving Business Lines"
            ],
            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"",
                "description" => ""
            ],
            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"BU",
                "description" => "Business"
            ],

            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"CB",
                "description" => "Combined Credit Plan"
            ],

            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"CC",
                "description" => "Credit Card"
            ],


            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"CE",
                "description" => "Commercial Line of Credit"
            ],


            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"CH",
                "description" => "Charge Account"
            ],


            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"CI",
                "description" => "Commercial Installment Loan"
            ],
            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"CO",
                "description" => "Consolidation"
            ],

            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"CP",
                "description" => "Child Support"
            ],

            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"CU",
                "description" => "Tellecommunications/Cellular"
            ],

            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"CV",
                "description" => "Conventional Real Estate Mortgage"
            ],

            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"CY",
                "description" => "Commercial Mortgage"
            ],

            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"",
                "description" => ""
            ],

            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"DC",
                "description" => "Debit Card"
            ],

            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"DR",
                "description" => "Deposit Acct with Overdraft Protection"
            ],

            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"DR",
                "description" => "Deposit Acct with Overdraft Protection"
            ],

            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"DS",
                "description" => "Debt Counseling Service"
            ],

            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"FC",
                "description" => "Factoring Company"
            ],

            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"FE",
                "description" => "Attorney Fees"
            ],

            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"FI",
                "description" => "FHA Home Improvement"
            ],

            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"FL",
                "description" => "FMHA Real Estate Mortgage"
            ],

            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"FM",
                "description" => "Family Support"
            ],

            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"FR",
                "description" => "FHA Real Estate Mortgage"
            ],

            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"FX",
                "description" => "Flexible Spending Credit Card"
            ],

            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"GA",
                "description" => "Government Employee Advance"
            ],

            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"GE",
                "description" => "Government Fee for Services"
            ],

            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"GF",
                "description" => "Government Fines"
            ],


            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"GG",
                "description" => "Government Grant"
            ],


            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"GO",
                "description" => "Government Overpayment"
            ],


            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"GS",
                "description" => "Government Secured"
            ],


            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"GU",
                "description" => "Government Unsecured Guar/Dir Ln"
            ],


            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"GV",
                "description" => "Government"
            ],


            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"HE",
                "description" => "Home Equity"
            ],


            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"HG",
                "description" => "Household Goods"
            ],


            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"HI",
                "description" => "Home Improvement"
            ],


            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"IS",
                "description" => "Installment Sales Contract"
            ],


            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"LC",
                "description" => "Line of Credit"
            ],


            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"LE",
                "description" => "Lease"
            ],


            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"LI",
                "description" => "Lender-placed Insurance"
            ],


            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"LN",
                "description" => "Construction Loan"
            ],


            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"LS",
                "description" => "Credit Line Secured"
            ],


            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"MB",
                "description" => "Manufactured Housing"
            ],


            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"MD",
                "description" => "Medical Debt"
            ],


            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"NT",
                "description" => "Note Loan"
            ],


            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"PS",
                "description" => "Partially Secured"
            ],



            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"RA",
                "description" => "Rental Agreement"
            ],
            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"RC",
                "description" => "Returned Check"
            ],
            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"RD",
                "description" => "Recreational Merchandise"
            ],
            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"RE",
                "description" => "Real Estate"
            ],
            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"RL",
                "description" => "Real Estate – Junior Liens"
            ],
            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"RM",
                "description" => "Real Estate Mortgage"
            ],
            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"SA",
                "description" => "Summary of Accounts"
            ],
            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"SC",
                "description" => "Secured Credit Card"
            ],
            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"SE",
                "description" => "Secured"
            ],
            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"SH",
                "description" => "Secured By Household Goods"
            ],
            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"SI",
                "description" => "Secured Home Improvement"
            ],
            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"SM",
                "description" => "Second Mortgage"
            ],
            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"SO",
                "description" => "Secured by Household Goods/Collateral"
            ],
            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"ST",
                "description" => "Student Loan"
            ],
            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"TS",
                "description" => "Time Share Loan"
            ],
            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"UC",
                "description" => "Utility Company"
            ],
            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"UK",
                "description" => "Unknown"
            ],
            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"US",
                "description" => "Unsecured"
            ],
            [
                'negative' => false,
                'title' =>"Account Type",
                'code' =>"VM",
                "description" => "VA Real Estate Mortgage"
            ],
            [
                'negative' => true,
                'title' =>"Affiliate Remark Codes",
                'code' =>"BKL",
                "description" => "Included in Bankruptcy"
            ],
            [
                'negative' => true,
                'title' =>"Affiliate Remark Codes",
                'code' =>"BKW",
                "description" => "Bankruptcy Withdrawn"
            ],
            [
                'negative' => true,
                'title' =>"Affiliate Remark Codes",
                'code' =>"CBL",
                "description" => "Chapter 7 Bankruptcy"
            ],
            [
                'negative' => true,
                'title' =>"Affiliate Remark Codes",
                'code' =>"CBR",
                "description" => "Chapter 11 Bankruptcy"
            ],
            [
                'negative' => true,
                'title' =>"Affiliate Remark Codes",
                'code' =>"CBT",
                "description" => "Chapter 12 Bankruptcy"
            ],
            [
                'negative' => true,
                'title' =>"Affiliate Remark Codes",
                'code' =>"DM",
                "description" => "Bankruptcy Dismissed"
            ],

            [
                'negative' => true,
                'title' =>"Affiliate Remark Codes",
                'code' =>"LA",
                "description" => "Lease Assumption"
            ],
            [
                'negative' => true,
                'title' =>"Affiliate Remark Codes",
                'code' =>"PRS",
                "description" => "Personal Receivership"
            ],
            [
                'negative' => true,
                'title' =>"Affiliate Remark Codes",
                'code' =>"REA",
                "description" => "Reaffirmation of Debt"
            ],
            [
                'negative' => true,
                'title' =>"Affiliate Remark Codes",
                'code' =>"WEP",
                "description" => "Chapter 13 Bankruptcy"
            ],
            [
                'negative' => false,
                'title' =>"Compliance Remark Codes",
                'code' =>"AID",
                "description" => "Acct Info Disputed by Consumer"
            ],
            [
                'negative' => false,
                'title' =>"Compliance Remark Codes",
                'code' =>"CAD",
                "description" => "Dispute Account/Closed by Consumer"
            ],
            [
                'negative' => false,
                'title' =>"Compliance Remark Codes",
                'code' =>"CBC",
                "description" => "Account Closed by Consumer"
            ],
            [
                'negative' => false,
                'title' =>"Compliance Remark Codes",
                'code' =>"CBD",
                "description" => "Dispute Resolved; Consumer Disagrees/Account Closed by Consumer"
            ],
            [
                'negative' => false,
                'title' =>"Compliance Remark Codes",
                'code' =>"DRC",
                "description" => "Dispute Resolved – Consumer Disagrees"
            ],
            [
                'negative' => false,
                'title' =>"Compliance Remark Codes",
                'code' =>"DRG",
                "description" => "Dispute Resolved Reported by Grantor"
            ],
            [
                'negative' => false,
                'title' =>"Generic Remark Codes",
                'code' =>"AAP",
                "description" => "Loan Assumed by Another Party"
            ],
            [
                'negative' => false,
                'title' =>"Generic Remark Codes",
                'code' =>"ACQ",
                "description" => "Acquired from Another Lender"
            ],

            [
                'negative' => false,
                'title' =>"Generic Remark Codes",
                'code' =>"ACR",
                "description" => "Account Closed Due to Refinance"
            ],
            [
                'negative' => false,
                'title' =>"Generic Remark Codes",
                'code' =>"ACT",
                "description" => "Account Closed Due to Transfer"
            ],

            [
                'negative' => false,
                'title' =>"Generic Remark Codes",
                'code' =>"AFR",
                "description" => "Account Required by FDIC"
            ],
            [
                'negative' => false,
                'title' =>"Generic Remark Codes",
                'code' =>"AJP",
                "description" => "Adjustment Pending"
            ],

            [
                'negative' => false,
                'title' =>"Generic Remark Codes",
                'code' =>"AMD",
                "description" => "Active Military Duty"
            ],
            [
                'negative' => false,
                'title' =>"Generic Remark Codes",
                'code' =>"AND",
                "description" => "Affected by Ntrl/Dclrd Disaster"
            ],

            [
                'negative' => false,
                'title' =>"Generic Remark Codes",
                'code' =>"BAL",
                "description" => "Balloon Payment"
            ],
            [
                'negative' => false,
                'title' =>"Generic Remark Codes",
                'code' =>"CBG",
                "description" => "Closed by Credit Grantor"
            ],

            [
                'negative' => false,
                'title' =>"Generic Remark Codes",
                'code' =>"CLB",
                "description" => "Contingent Liab/Corp Defaults"
            ],
            [
                'negative' => false,
                'title' =>"Generic Remark Codes",
                'code' =>"CLC",
                "description" => "Account Closed"
            ],

            [
                'negative' => false,
                'title' =>"Generic Remark Codes",
                'code' =>"CLR",
                "description" => "CL Reduced-Collateral Depreciation"
            ],
            [
                'negative' => false,
                'title' =>"Generic Remark Codes",
                'code' =>"CLS",
                "description" => "Credit Line Suspended"
            ],

            [
                'negative' => false,
                'title' =>"Generic Remark Codes",
                'code' =>"CPB",
                "description" => "Cust Pays Balance in Full Each Month"
            ],
            [
                'negative' => false,
                'title' =>"Generic Remark Codes",
                'code' =>"CRB",
                "description" => "Colat Releaased - Balance Owing"
            ],

            [
                'negative' => false,
                'title' =>"Generic Remark Codes",
                'code' =>"CTR",
                "description" => "Account Closed – Transfer or Refinance"
            ],
            [
                'negative' => false,
                'title' =>"Generic Remark Codes",
                'code' =>"CTS",
                "description" => "Contact Subscriber"
            ],

            [
                'negative' => false,
                'title' =>"Generic Remark Codes",
                'code' =>"ER",
                "description" => "Election of Remedy"
            ],
            [
                'negative' => true,
                'title' =>"Generic Remark Codes",
                'code' =>"ETB",
                "description" => "Early Termination/Balance Owning"
            ],

            [
                'negative' => true,
                'title' =>"Generic Remark Codes",
                'code' =>"ETI",
                "description" => "Early Termination/Insurance Loss"
            ],
            [
                'negative' => true,
                'title' =>"Generic Remark Codes",
                'code' =>"ETO",
                "description" => "Early Termination/Obligation Satisfied"
            ],

            [
                'negative' => true,
                'title' =>"Generic Remark Codes",
                'code' =>"ETS",
                "description" => "Early Termination/Status Pending"
            ],
            [
                'negative' => true,
                'title' =>"Generic Remark Codes",
                'code' =>"FCL",
                "description" => "Foreclosure"
            ],

            [
                'negative' => false,
                'title' =>"Generic Remark Codes",
                'code' =>"FOR",
                "description" => "Account in Forebearance"
            ],
            [
                'negative' => true,
                'title' =>"Generic Remark Codes",
                'code' =>"FPI",
                "description" => "Foreclosure Initiated"
            ],

            [
                'negative' => true,
                'title' =>"Generic Remark Codes",
                'code' =>"FTB",
                "description" => "Full Termination/Balance Owning"
            ],
            [
                'negative' => true,
                'title' =>"Generic Remark Codes",
                'code' =>"FTO",
                "description" => "Full Termination/Obligation Satisfied"
            ],

            [
                'negative' => true,
                'title' =>"Generic Remark Codes",
                'code' =>"FTS",
                "description" => "Full Termination/Status Pending"
            ],
            [
                'negative' => false,
                'title' =>"Generic Remark Codes",
                'code' =>"INA",
                "description" => "Closed Due to Inactivity"
            ],

            [
                'negative' => true,
                'title' =>"Generic Remark Codes",
                'code' =>"INP",
                "description" => "Debt being Paid through Insurance"
            ],
            [
                'negative' => true,
                'title' =>"Generic Remark Codes",
                'code' =>"INS",
                "description" => "Paid through Insurance"
            ],

            [
                'negative' => true,
                'title' =>"Generic Remark Codes",
                'code' =>"IRB",
                "description" => "Involuntary Repossession/Balance Owning"
            ],
            [
                'negative' => true,
                'title' =>"Generic Remark Codes",
                'code' =>"IRE",
                "description" => "Involuntary Repossession"
            ],

            [
                'negative' => true,
                'title' =>"Generic Remark Codes",
                'code' =>"IRO",
                "description" => " Involuntary Repo/Obligation Satisfied"
            ],
            [
                'negative' => true,
                'title' =>"Generic Remark Codes",
                'code' =>"JUG",
                "description" => "Judgment Granted"
            ],

            [
                'negative' => true,
                'title' =>"Generic Remark Codes",
                'code' =>"LMD",
                "description" => "Loan Modified/Federal Government Plan"
            ],
            [
                'negative' => true,
                'title' =>"Generic Remark Codes",
                'code' =>"LMN",
                "description" => "Loan Modified/Non Goverment"
            ],

            [
                'negative' => false,
                'title' =>"Generic Remark Codes",
                'code' =>"LNA",
                "description" => "CL No Longer Avl/In Rpymt Phase"
            ],
            [
                'negative' => false,
                'title' =>"Generic Remark Codes",
                'code' =>"MCC",
                "description" => "Managed by Financial Counseling Program"
            ],

            [
                'negative' => false,
                'title' =>"Generic Remark Codes",
                'code' =>"MOV",
                "description" => "No Forewarding Address"
            ],
            [
                'negative' => false,
                'title' =>"Generic Remark Codes",
                'code' =>"NIR",
                "description" => "Student Loan Not in Repayment"
            ],

            [
                'negative' => false,
                'title' =>"Generic Remark Codes",
                'code' =>"NPA",
                "description" => "Now Paying"
            ],
            [
                'negative' => false,
                'title' =>"Generic Remark Codes",
                'code' =>"PAL",
                "description" => "Purchased by Another Lender"
            ],

            [
                'negative' => false,
                'title' =>"Generic Remark Codes",
                'code' =>"PDD",
                "description" => "Paid by Dealer"
            ],
            [
                'negative' => false,
                'title' =>"Generic Remark Codes",
                'code' =>"PDE",
                "description" => "Payment Deferred"
            ],
            [
                'negative' => false,
                'title' =>"Generic Remark Codes",
                'code' =>"PDI",
                "description" => "Principal Deferred/Interest Payment Only"
            ],
            [
                'negative' => true,
                'title' =>"Generic Remark Codes",
                'code' =>"PFC",
                "description" => "Account Paid from Collateral"
            ],
            [
                'negative' => false,
                'title' =>"Generic Remark Codes",
                'code' =>"PLL",
                "description" => "Prepaid Lease"
            ],
            [
                'negative' => true,
                'title' =>"Generic Remark Codes",
                'code' =>"PNR",
                "description" => "First Payment Never Received"
            ],
            [
                'negative' => true,
                'title' =>"Generic Remark Codes",
                'code' =>"PPA",
                "description" => "Paying Partial/Modified Pmt Agreement"
            ],
            [
                'negative' => false,
                'title' =>"Generic Remark Codes",
                'code' =>"PPD",
                "description" => "Paid by Co-Maker"
            ],
            [
                'negative' => false,
                'title' =>"Generic Remark Codes",
                'code' =>"PRD",
                "description" => "Payroll Deduction"
            ],
            [
                'negative' => true,
                'title' =>"Generic Remark Codes",
                'code' =>"PWG",
                "description" => "Paying Through Garnishment"
            ],
            [
                'negative' => false,
                'title' =>"Generic Remark Codes",
                'code' =>"REP",
                "description" => "Replacement/Substitute Account"
            ],
            [
                'negative' => true,
                'title' =>"Generic Remark Codes",
                'code' =>"RRE",
                "description" => "Redeemed Repossession"
            ],
            [
                'negative' => true,
                'title' =>"Generic Remark Codes",
                'code' =>"RVR",
                "description" => "Voluntary Surrender Redeemed"
            ],
            [
                'negative' => false,
                'title' =>"Generic Remark Codes",
                'code' =>"SCD",
                "description" => "CL Suspended – Collateral Depreciation"
            ],
            [
                'negative' => false,
                'title' =>"Generic Remark Codes",
                'code' =>"SET",
                "description" => "Settled – Less than Full Balance"
            ],
            [
                'negative' => false,
                'title' =>"Generic Remark Codes",
                'code' =>"SIL",
                "description" => "Simple Interest Loan"
            ],
            [
                'negative' => false,
                'title' =>"Generic Remark Codes",
                'code' =>"SLP",
                "description" => "Student Loan Assigned to Government"
            ],
            [
                'negative' => false,
                'title' =>"Generic Remark Codes",
                'code' =>"SPL",
                "description" => "Single Payment Loan"
            ],
            [
                'negative' => false,
                'title' =>"Generic Remark Codes",
                'code' =>"STL",
                "description" => "Credit Card Lost or Stolen"
            ],
            [
                'negative' => false,
                'title' =>"Generic Remark Codes",
                'code' =>"TRL",
                "description" => "Transferred to Another Lender"
            ],
            [
                'negative' => true,
                'title' =>"Generic Remark Codes",
                'code' =>"TTR",
                "description" => "Transferred to Recovery"
            ],
            [
                'negative' => true,
                'title' =>"Rating Remark Codes",
                'code' =>"CLA",
                "description" => "Place Collection"
            ],
            [
                'negative' => true,
                'title' =>"Rating Remark Codes",
                'code' =>"CLO",
                "description" => "Closed"
            ],
            [
                'negative' => true,
                'title' =>"Rating Remark Codes",
                'code' =>"DLU",
                "description" => "Deed in Lieu"
            ],
            [
                'negative' => true,
                'title' =>"Rating Remark Codes",
                'code' =>"FPD",
                "description" => "Account Paid, Foreclosure Started"
            ],
            [
                'negative' => true,
                'title' =>"Rating Remark Codes",
                'code' =>"FRD",
                "description" => "Foreclosure, Collateral Sold"
            ],
            [
                'negative' => true,
                'title' =>"Rating Remark Codes",
                'code' =>"PCL",
                "description" => "Paid Collection"
            ],
            [
                'negative' => true,
                'title' =>"Rating Remark Codes",
                'code' =>"PLP",
                "description" => "Now Paying/Was a Charge Off"
            ],
            [
                'negative' => true,
                'title' =>"Rating Remark Codes",
                'code' =>"PPL",
                "description" => "Paid in Full/Was a Charge Off"
            ],
            [
                'negative' => true,
                'title' =>"Rating Remark Codes",
                'code' =>"PRL",
                "description" => "Unpaid Balance Charge Off"
            ],
            [
                'negative' => true,
                'title' =>"Rating Remark Codes",
                'code' =>"RFN",
                "description" => "Refinanced"
            ],
            [
                'negative' => true,
                'title' =>"Rating Remark Codes",
                'code' =>"RPD",
                "description" => "Paid Repossesssion"
            ],
            [
                'negative' => true,
                'title' =>"Rating Remark Codes",
                'code' =>"RVN",
                "description" => "Voluntary Surrender"
            ],
            [
                'negative' => true,
                'title' =>"Rating Remark Codes",
                'code' =>"SGL",
                "description" => "Claim Filed with Government"
            ],
            [
                'negative' => true,
                'title' =>"Rating Remark Codes",
                'code' =>"TRF",
                "description" => "Transfer to Another Office"
            ],
            [
                'negative' => false,
                'title' =>"ECOA Designator",
                'code' =>"U",
                "description" => "Undesignated account"
            ],
            [
                'negative' => false,
                'title' =>"ECOA Designator",
                'code' =>"I",
                "description" => "Individual account"
            ],
            [
                'negative' => false,
                'title' =>"ECOA Designator",
                'code' =>"C",
                "description" => "Joint contractual liablity on account"
            ],
            [
                'negative' => false,
                'title' =>"ECOA Designator",
                'code' =>"A",
                "description" => "Authorized user on account"
            ],
            [
                'negative' => false,
                'title' =>"ECOA Designator",
                'code' =>"P",
                "description" => "Participant on account"
            ],
            [
                'negative' => false,
                'title' =>"ECOA Designator",
                'code' =>"S",
                "description" => "Co-signor on account"
            ],
            [
                'negative' => false,
                'title' =>"ECOA Designator",
                'code' =>"M",
                "description" => "Primary borrower on account"
            ],
            [
                'negative' => false,
                'title' =>"ECOA Designator",
                'code' =>"T",
                "description" => "Account relationship terminated"
            ],
            [
                'negative' => false,
                'title' =>"ECOA Designator",
                'code' =>"X",
                "description" => "Consumer Deceased"
            ],
            [
                'negative' => false,
                'title' =>"Portfolio Type",
                'code' =>"O",
                "description" => "Open Account"
            ],

            [
                'negative' => false,
                'title' =>"Portfolio Type",
                'code' =>"R",
                "description" => "Revolving Account"
            ],

            [
                'negative' => false,
                'title' =>"Portfolio Type",
                'code' =>"I",
                "description" => "Installment Account"
            ],

            [
                'negative' => false,
                'title' =>"Portfolio Type",
                'code' =>"M",
                "description" => "Mortgage Account"
            ],

            [
                'negative' => false,
                'title' =>"Portfolio Type",
                'code' =>"C",
                "description" => "Line of Credit"
            ],

            [
                'negative' => false,
                'title' =>"Account Rating Codes",
                'code' =>"01",
                "description" => "Paid or paying as agreed"
            ],

            [
                'negative' => true,
                'title' =>"Account Rating Codes",
                'code' =>"02",
                "description" => "30 days past due"
            ],
            [
                'negative' => true,
                'title' =>"Account Rating Codes",
                'code' =>"03",
                "description" => "60 days past due"
            ],
            [
                'negative' => true,
                'title' =>"Account Rating Codes",
                'code' =>"04",
                "description" => "90 days past due"
            ],
            [
                'negative' => true,
                'title' =>"Account Rating Codes",
                'code' =>"05",
                "description" => "120 days past due"
            ],
            [
                'negative' => true,
                'title' =>"Account Rating Codes",
                'code' =>"07",
                "description" => "Wage earner or similar plan"
            ],
            [
                'negative' => true,
                'title' =>"Account Rating Codes",
                'code' =>"08",
                "description" => "Repossession"
            ],
            [
                'negative' => true,
                'title' =>"Account Rating Codes",
                'code' =>"8A",
                "description" => "Voluntary Surrender"
            ],
            [
                'negative' => true,
                'title' =>"Account Rating Codes",
                'code' =>"8P",
                "description" => "Payment after Repossession"
            ],
            [
                'negative' => true,
                'title' =>"Account Rating Codes",
                'code' =>"09",
                "description" => "Charged Off as Bad Debt"
            ],
            [
                'negative' => true,
                'title' =>"Account Rating Codes",
                'code' =>"9B",
                "description" => "Collection"
            ],
            [
                'negative' => true,
                'title' =>"Account Rating Codes",
                'code' =>"9P",
                "description" => "Payment after Charge Off/Collection"
            ],
            [
                'negative' => true,
                'title' =>"Account Rating Codes",
                'code' =>"UR",
                "description" => "Unrated or Bankruptcy"
            ],
            [
                'negative' => false,
                'title' =>"Payment Pattern Codes",
                'code' =>"1",
                "description" => "Current account"
            ],
            [
                'negative' => false,
                'title' =>"Payment Pattern Codes",
                'code' =>"E",
                "description" => "Current account zero balance"
            ],
            [
                'negative' => true,
                'title' =>"Payment Pattern Codes",
                'code' =>"2",
                "description" => "Account 30 days past due date"
            ],
            [
                'negative' => true,
                'title' =>"Payment Pattern Codes",
                'code' =>"3",
                "description" => "Account 60 days past due date"
            ],
            [
                'negative' => true,
                'title' =>"Payment Pattern Codes",
                'code' =>"4",
                "description" => "Account 90 days past due date"
            ],
            [
                'negative' => true,
                'title' =>"Payment Pattern Codes",
                'code' =>"5",
                "description" => "Account 120 days past due date"
            ],
            [
                'negative' => true,
                'title' =>"Payment Pattern Codes",
                'code' =>"6",
                "description" => "Account 150+ days past due date"
            ],
            [
                'negative' => true,
                'title' =>"Payment Pattern Codes",
                'code' =>"X",
                "description" => "Unrated"
            ],
            [
                'negative' => true,
                'title' =>"Payment Pattern Codes",
                'code' =>"Y",
                "description" => "Unrated (no update received)"
            ],
            [
                'negative' => true,
                'title' =>"Payment Pattern Codes",
                'code' =>"J",
                "description" => "Voluntary Surrender"
            ],
            [
                'negative' => true,
                'title' =>"Payment Pattern Codes",
                'code' =>"K",
                "description" => "Repossession/ Paid Repossession"
            ],
            [
                'negative' => true,
                'title' =>"Payment Pattern Codes",
                'code' =>"G",
                "description" => "Collection/Paid Collection"
            ],
            [
                'negative' => true,
                'title' =>"Payment Pattern Codes",
                'code' =>"L",
                "description" => "Charge-off/Paid Charge-off"
            ],
            [
                'negative' => true,
                'title' =>"Payment Pattern Codes",
                'code' =>"H",
                "description" => "Foreclosure Completed"
            ],
            [
                'negative' => true,
                'title' =>"Public Record Codes",
                'code' =>"1D",
                "description" => "Chapter 11 Bankruptcy Dismissed"
            ],
            [
                'negative' => true,
                'title' =>"Public Record Codes",
                'code' =>"1F",
                "description" => "Chapter 11 Bankruptcy Filing"
            ],
            [
                'negative' => true,
                'title' =>"Public Record Codes",
                'code' =>"1X",
                "description" => "Chapter 11 Bankruptcy Discharged"
            ],
            [
                'negative' => true,
                'title' =>"Public Record Codes",
                'code' =>"2D",
                "description" => "Chapter 12 Bankruptcy Dismissed"
            ],
            [
                'negative' => true,
                'title' =>"Public Record Codes",
                'code' =>"2F",
                "description" => "Chapter 12 Bankruptcy Filing"
            ],
            [
                'negative' => true,
                'title' =>"Public Record Codes",
                'code' =>"2X",
                "description" => "Chapter 12 Bankruptcy Discharged"
            ],
            [
                'negative' => true,
                'title' =>"Public Record Codes",
                'code' =>"3D",
                "description" => "Chapter 13 Bankruptcy Dismissed"
            ],
            [
                'negative' => true,
                'title' =>"Public Record Codes",
                'code' =>"3F",
                "description" => "Chapter 13 Bankruptcy Filing"
            ],
            [
                'negative' => true,
                'title' =>"Public Record Codes",
                'code' =>"3X",
                "description" => "Chapter 13 Bankruptcy Discharged"
            ],
            [
                'negative' => true,
                'title' =>"Public Record Codes",
                'code' =>"7D",
                "description" => "Chapter 7 Bankruptcy Dismissed"
            ],
            [
                'negative' => true,
                'title' =>"Public Record Codes",
                'code' =>"7F",
                "description" => "Chapter 7 Bankruptcy Filing"
            ],
            [
                'negative' => true,
                'title' =>"Public Record Codes",
                'code' =>"7X",
                "description" => "Chapter 7 Bankruptcy Discharged"
            ],
            [
                'negative' => true,
                'title' =>"Public Record Codes",
                'code' =>"CB",
                "description" => "Civil Judgment in Bankruptcy"
            ],
            [
                'negative' => true,
                'title' =>"Public Record Codes",
                'code' =>"CJ",
                "description" => "Civil Judgment"
            ],
            [
                'negative' => true,
                'title' =>"Public Record Codes",
                'code' =>"CP",
                "description" => "Child Support"
            ],
            [
                'negative' => true,
                'title' =>"Public Record Codes",
                'code' =>"FC",
                "description" => "Foreclosure"
            ],
            [
                'negative' => true,
                'title' =>"Public Record Codes",
                'code' =>"FT",
                "description" => "Federal Tax Lien"
            ],
            [
                'negative' => true,
                'title' =>"Public Record Codes",
                'code' =>"JL",
                "description" => "Judicial Lien"
            ],
            [
                'negative' => true,
                'title' =>"Public Record Codes",
                'code' =>"PC",
                "description" => "Paid Civil Jugment"
            ],
            [
                'negative' => true,
                'title' =>"Public Record Codes",
                'code' =>"PF",
                "description" => "Paid Federal Tax Lien"
            ],
            [
                'negative' => true,
                'title' =>"Public Record Codes",
                'code' =>"PL",
                "description" => "Paid Tax Lien"
            ],
            [
                'negative' => true,
                'title' =>"Public Record Codes",
                'code' =>"RL",
                "description" => "Release of Tax Lien"
            ],
            [
                'negative' => true,
                'title' =>"Public Record Codes",
                'code' =>"SF",
                "description" => "Satisfied Foreclosure"
            ],
            [
                'negative' => true,
                'title' =>"Public Record Codes",
                'code' =>"SL",
                "description" => "State Tax Lien"
            ],
            [
                'negative' => true,
                'title' =>"Public Record Codes",
                'code' =>"TB",
                "description" => "Tax Lien Relieved in Bankruptcy"
            ],
            [
                'negative' => true,
                'title' =>"Public Record Codes",
                'code' =>"TL",
                "description" => "Tax Lien"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"A",
                "description" => "Automotive"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"AA",
                "description" => "Auctions/Wholesale"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"AC",
                "description" => "Auto/Truck Leasing"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"AF",
                "description" => "Farm Implement Dealers"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"AL",
                "description" => "Truck Dealers"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"AN",
                "description" => "Auto Dealers, New"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"AP",
                "description" => "Auto Parts"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"AR",
                "description" => "Auto Repairs, Body Shops"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"AS",
                "description" => "Service Stations"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"AT",
                "description" => "TBA Stores, Tire Dealers"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"AU",
                "description" => "Auto Dealers, Used"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"AZ",
                "description" => "Miscellaneous"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"B",
                "description" => "Bank"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"BA",
                "description" => "Auto Loans"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"BB",
                "description" => "Commercial Banks"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"BC",
                "description" => "Credit Cards"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"BH",
                "description" => "Home Equity Loans"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"BI",
                "description" => "Installment Loans"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"BL",
                "description" => "Line of Credit"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"BM",
                "description" => "Mortgage Loans"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"BO",
                "description" => "Full Service Banks"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"BS",
                "description" => "Student Loans"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"BY",
                "description" => "Bank Collections"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"",
                "description" => ""
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"BZ",
                "description" => "Miscellaneous"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"C",
                "description" => "Clothing"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"CB",
                "description" => "Men's Apparel"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"CG",
                "description" => "Men's/Women Apparel"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"CO",
                "description" => "Off Price Clothing"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"CS",
                "description" => "Specialty Clothing"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"CT",
                "description" => "Textile Mills"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"CU",
                "description" => "Upscale Clothing"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"CW",
                "description" => "Women's Apparel"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"CY",
                "description" => "Clothing Store Collection"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"CZ",
                "description" => "Miscellaneous"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"D",
                "description" => "Department/Variety and Other Retail"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"DC",
                "description" => "Complete Department Store"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"DG",
                "description" => "Complete Department Store"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"DN",
                "description" => "National Chain"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"DO",
                "description" => "Off Price Store"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"DP",
                "description" => "Mail Order"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"DU",
                "description" => "Used Merchandise"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"DV",
                "description" => "Variety Store"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"DY",
                "description" => "Department Store Collection"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"DZ",
                "description" => "Miscellaneous"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"E",
                "description" => "Education/Employment Services"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"EB",
                "description" => "Business Education"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"",
                "description" => ""
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"",
                "description" => ""
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"",
                "description" => ""
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"EL",
                "description" => "Student Loans Servicing"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"ES",
                "description" => "Employment Services"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"ET",
                "description" => "Junior Colleges/Technical Education"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"EU",
                "description" => "Universities/Colleges"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"EV",
                "description" => "Vocational/Trade Schools"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"EY",
                "description" => "Education Collection"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"EZ",
                "description" => "Miscellaneous"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"F",
                "description" => "Finance/Personal"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"FA",
                "description" => "Auto Financing"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"FC",
                "description" => "Credit Cards Issued by Finance Companies"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"FF",
                "description" => "Sales Financing"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"FH",
                "description" => "Home Equity Loans"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"FI",
                "description" => "Investment Firms"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"FM",
                "description" => "Mortgage Loans"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"FP",
                "description" => "Personal Loan Companies"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"FS",
                "description" => "Savings and Loan Companies"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"FY",
                "description" => "Finance Companies"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"FZ",
                "description" => "Miscellaneous"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"G",
                "description" => "Groceries"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"GB",
                "description" => "Bakeries"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"GD",
                "description" => "Dairies"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"GL",
                "description" => "Liquor Stores"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"GM",
                "description" => "Meat/Fish Markets"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"GN",
                "description" => "Neighborhood Grocery"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"GS",
                "description" => "Supermarkets"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"GZ",
                "description" => "Miscellaneous"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"H",
                "description" => "Home/Office Furnishing"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"HA",
                "description" => "Appliance Sales and Service"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"HC",
                "description" => "Carpet/Floor Coverings"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"HD",
                "description" => "Interior Decorators/Design"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"HE",
                "description" => "Home Electronics Sales"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"HF",
                "description" => "Furniture/Home Office Furnishings"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"",
                "description" => ""
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"HM",
                "description" => "Music/Record Stores"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"HR",
                "description" => "Furniture Rentals/Leasing"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"HT",
                "description" => "Television/Radio Sales and Service"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"HY",
                "description" => "Home/Office Furnishings Collection"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"HZ",
                "description" => "Miscellaneous"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"I",
                "description" => "Insurance"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"IG",
                "description" => "General Insurance"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"IH",
                "description" => "Health and Accident Insurance"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"IL",
                "description" => "Life Insurance"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"IP",
                "description" => "Property and Casuality Insurance"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"IR",
                "description" => "Retirement/Pension Plans"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"IZ",
                "description" => "Miscellaneous"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"J",
                "description" => "Jewelry, Cameras and Computers"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"JA",
                "description" => "Jewelers"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"JC",
                "description" => "Cameras"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"JZ",
                "description" => "Miscellaneous Jewelry, Cameras and Computers"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"K",
                "description" => "Lumber/Building Materials/Hardware"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"LA",
                "description" => "Air Conditioning & Heating, Plumbing, Electrical Sales and Service"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"LD",
                "description" => "Doors/Windows Sales and Service"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"LF",
                "description" => "Fixture and Cabinet Suplies"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"LH",
                "description" => "Hardware Stores"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"LP",
                "description" => "Paint, Glass, Wallpaper Stores"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"LY",
                "description" => "Lumber Yards/Mills"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"LZ",
                "description" => "Miscellaneous"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"M",
                "description" => "Medical/Related Health"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"MB",
                "description" => "Dentists"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"MC",
                "description" => "Chiropractors"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"MD",
                "description" => "Doctors/Clinics"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"ME",
                "description" => "Medical Equipment"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"MF",
                "description" => "Funeral Homes"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"MH",
                "description" => "Hospitals"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"MM",
                "description" => "Cemeteries"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"MO",
                "description" => "Osteopaths"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"MP",
                "description" => "Pharmacies/Drug Stores"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"MV",
                "description" => "Veterinarians/Animal Services"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"MZ",
                "description" => "Miscellaneous"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"N",
                "description" => "Travel/Entertaiment"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"NA",
                "description" => "Airline Card"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"NB",
                "description" => "Airline Card"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"NC",
                "description" => "Affinity Credit Card"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"ND",
                "description" => "National Drug Chain"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"NR",
                "description" => "Auto Rental Companies"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"NT",
                "description" => "Travel/Entertainment Card"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"NZ",
                "description" => "Miscellaneous"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"O",
                "description" => "Oil Companies"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"OC",
                "description" => "Oil Companies"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"OZ",
                "description" => "Miscellaneous"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"P",
                "description" => "Personal Services Other than Medical"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"PA",
                "description" => "Accountants/Related"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"PB",
                "description" => "Barber/Beauty Shops"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"PC",
                "description" => "Equipment Rentals/Lease"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"PD",
                "description" => "Dry Cleaning/Laundry and Related Services"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"PE",
                "description" => "Engineering of all Kinds"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"PF",
                "description" => "Florists"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"PG",
                "description" => "Photographers"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"PH",
                "description" => "Health and Fitness Clubs"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"PI",
                "description" => "Investigative/Detective Services"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"",
                "description" => ""
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"PJ",
                "description" => "Janitorial Services"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"PL",
                "description" => "Legal and Related Services"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"PM",
                "description" => "Management/Investment Services"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"PN",
                "description" => "Entertainment"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"PP",
                "description" => "Pest Control"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"PR",
                "description" => "Restaurants/Bars/Country Clubs"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"PS",
                "description" => "Storage/Warehouse"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"PT",
                "description" => "Transportatin/Delivery Service"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"PZ",
                "description" => "Miscellaneous"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"Q",
                "description" => "Finance Companies Other Than Personal Finance Co"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"QA",
                "description" => "Auto Finance Co"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"QC",
                "description" => "Credit Cards Issued by Credit Unions"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"QF",
                "description" => "Sales Financing Companies"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"QM",
                "description" => "Mortgage Companies"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"QU",
                "description" => "Credit Unions"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"QY",
                "description" => "Line of Credit"
            ],
            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"QZ",
                "description" => "Miscellaneous"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"R",
                "description" => "Real Estate and Public Accommodations"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"RA",
                "description" => "Apartments"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"RC",
                "description" => "Office Leasing"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"RD",
                "description" => "Mobile Home Manufacturers/Dealers"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"RE",
                "description" => "Real Estate, Sales and Rentals"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"RH",
                "description" => "Hotels"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"RM",
                "description" => "Motels"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"RP",
                "description" => "Mobile Home Parks"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"RR",
                "description" => "Property Managment"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"RZ",
                "description" => "Miscellaneous"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"S",
                "description" => "Sporting Goods"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"SA",
                "description" => "Aircraft Sales and Service"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"SB",
                "description" => "Boats/Marinas Sales/Service"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"SG",
                "description" => "Sporting Goods Stores"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"SM",
                "description" => "Motorcycles/Bicycles Sales and Service"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"SZ",
                "description" => "Miscellaneous"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"T",
                "description" => "Farm and Garden Supplies"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"TC",
                "description" => "Farm Chemicals/Fertilizer Store"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"TF",
                "description" => "Feed/Seed Stores"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"TN",
                "description" => "Nursery/Landscaping Supplies/Services"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"TZ",
                "description" => "Miscellaneous"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"U",
                "description" => "Utilities and Fuel"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"UB",
                "description" => "Cable/Satellitte Complex"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"UC",
                "description" => "Coal/Wood Dealers"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"UD",
                "description" => "Garbage/Rubbish Disposal Companies"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"UE",
                "description" => "Electric Light/Power Companies"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"UF",
                "description" => "Fuel/Oil Distributors"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"UG",
                "description" => "Gas Companies"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"UR",
                "description" => "Cellular Telephone/Paging Companies"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"UT",
                "description" => "Telephone Companies"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"UW",
                "description" => "Water/Sanitary Service Companies"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"UZ",
                "description" => "Miscellaneous"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"",
                "description" => ""
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"V",
                "description" => "Government"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"VC",
                "description" => "City/County"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"VF",
                "description" => "Federal"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"VG",
                "description" => "Government Student Loans"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"VL",
                "description" => "Law Enforcement"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"VS",
                "description" => "State"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"VZ",
                "description" => "Miscellaneous"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"W",
                "description" => "Wholesale"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"WA",
                "description" => "Automotive Supplies"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"WB",
                "description" => "Building Supplies/Hardware"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"WC",
                "description" => "Clothing/Dry Goods"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"WD",
                "description" => "Drugs/Chemicals"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"WG",
                "description" => "Groceries/Related Products"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"WH",
                "description" => "Home/Office Furnishings"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"WM",
                "description" => "Machinery/Equipmant Supplies"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"WP",
                "description" => "Petroleum Products"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"WZ",
                "description" => "Miscellaneous"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"X",
                "description" => "Advertising"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"XA",
                "description" => "Agencies"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"XM",
                "description" => "Media"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"XZ",
                "description" => "Miscellaneous"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"Y",
                "description" => "Collection Services"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"YA",
                "description" => "Collection Departments within ACB Credit Bureaus"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"YC",
                "description" => "Other Collection Agencies"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"Z",
                "description" => "Resellers"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"ZA",
                "description" => "Credit Bureau/Automotive Processing"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"ZB",
                "description" => "Credit Bureau Brokers"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"ZC",
                "description" => "Credit Bureau Inquiries"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"ZM",
                "description" => "Credit Bureaus/Mortage Processing"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"ZP",
                "description" => "Public Records"
            ],

            [
                'negative' => false,
                'title' =>"Industry Codes",
                'code' =>"ZT",
                "description" => "Tenant Screeners For Resellers"
            ],

        ]);
    }
}
