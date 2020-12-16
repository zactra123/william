<?php

namespace App\Services;

use App\ClientReportExAccount;
use App\ClientReportTuAccount;
use App\DisputesPricing;

class PricingDetails
{
    protected $pricing;

    public function __construct($affiliate)
    {
        $this->pricing = DisputesPricing::where('user_id', $affiliate)->first();
        if(empty($this->pricing)){
            $this->pricing = DisputesPricing::where('user_id', null)->first();
        }

    }

    public function personalInformation()
    {
        return $this->pricing->personal_info;;
    }

    public function statement()
    {
        return $this->pricing->fraud_alerts;
    }

    public function inquiries()
    {
        return $this->pricing->inquiries;
    }

    public function exAccountPrice($bureau, $exAccountId)
    {
        $exAccount = ClientReportExAccount::where('id', $exAccountId)->first();

        dd($exAccount->paymentHistories);

    }
    public function tuAccountPrice( $bureau, $tuAccountId)
    {

        $tuAccount = ClientReportTuAccount::where('id', $tuAccountId)->first();

        $subType = $tuAccount->sub_type;
        $loanType = strtolower($tuAccount->loan_type);
        $dateClose = $tuAccount->date_closed;
        $accountType = strtolower($tuAccount->account_type_description);
        $priceAccount = null;
        $priceAccountBlock = null;


        if($subType == 'trade' && strpos($loanType, 'credit card') !== false
            && strpos($accountType, 'revolving') !== false){
            $priceAccount =  $this->pricing->cc_charged_off;
            $priceAccountBlock = $this->pricing->cc_accnt_bloking;
        }
        dd($tuAccount);

        dd($subType, $loanType, $accountType);


        dd($affiliate,  $bureau, $tuAccountId);


    }
    public function eqAccountPrice($bureau, $eqAccountId)
    {
        $eqAccount = ClientReportExAccount::where('id', $eqAccountId)->first();

        dd($eqAccount);

        dd($affiliate,  $bureau, $eqAccountId);


    }

}
