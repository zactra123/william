<?php

namespace App\Services;

use App\ClientReportExAccount;
use App\ClientReportTuAccount;
use App\DisputesPricing;

class PricingDetails
{

    public function personalInformation($affiliate,  $bureau)
    {

        $price = DisputesPricing::where('user_id', $affiliate)->first();
        if(empty($price)){
            $price = DisputesPricing::where('user_id', null)->first();
        }
        $personalInfo = $price->personal_info;

        return $personalInfo;

    }
    public function statement( $affiliate,  $bureau, $statementId)
    {
        $price = DisputesPricing::where('user_id', $affiliate)->first();
        if(empty($price)){
            $price = DisputesPricing::where('user_id', null)->first();
        }
        $statement = $price->fraud_alerts;
        return $statement;
    }
    public function inquiries( $affiliate,  $bureau, $inquiryId)
    {
        $price = DisputesPricing::where('user_id', $affiliate)->first();
        if(empty($price)){
            $price = DisputesPricing::where('user_id', null)->first();
        }
        $inquiryPrice = $price->inquiries;
        return $inquiryPrice;
    }

    public function exAccountPrice($affiliate,  $bureau, $exAccountId)
    {
        $exAccount = ClientReportExAccount::where('id', $exAccountId)->first();

        dd($exAccount->paymentHistories);

        dd($affiliate,  $bureau, $exAccountId);

    }
    public function tuAccountPrice($affiliate,  $bureau, $tuAccountId)
    {
        $price = DisputesPricing::where('user_id', $affiliate)->first();
        if(empty($price)){
            $price = DisputesPricing::where('user_id', null)->first();
        }

        $tuAccount = ClientReportTuAccount::where('id', $tuAccountId)->first();

        $subType = $tuAccount->sub_type;
        $loanType = strtolower($tuAccount->loan_type);
        $dateClose = $tuAccount->date_closed;
        $accountType = strtolower($tuAccount->account_type_description);
        $priceAccount = null;
        $priceAccountBlock = null;


        if($subType == 'trade' && strpos($loanType, 'credit card') !== false
            && strpos($accountType, 'revolving') !== false){
            $priceAccount =  $price->cc_charged_off;
            $priceAccountBlock = $price->cc_accnt_bloking;




        }
        dd($tuAccount);

        dd($subType, $loanType, $accountType);


        dd($affiliate,  $bureau, $tuAccountId);


    }
    public function eqAccountPrice($affiliate,  $bureau, $eqAccountId)
    {
        $eqAccount = ClientReportExAccount::where('id', $eqAccountId)->first();

        dd($eqAccount);

        dd($affiliate,  $bureau, $eqAccountId);


    }

}
