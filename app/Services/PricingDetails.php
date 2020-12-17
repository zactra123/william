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
        $type = $exAccount->type;
        $status = $exAccount->status;
        $priceAccount = null;
        $priceAccountBlock = null;

        if (strpos($type, 'credit card') !== false) {
            if (strpos($status, 'charged off') !== false) {
                $priceAccount =  $this->pricing->cc_charged_off;
                $priceAccountBlock = $this->pricing->cc_accnt_bloking;
            }
        }


        $dataPrice = [
            'inaccurate_price'=> $priceAccount,
            'not_mine_type'=> $priceAccountBlock,
        ];

        dd($dataPrice);
        return $dataPrice;
    }

    public function tuAccountPrice( $bureau, $tuAccountId)
    {
        $tuAccount = ClientReportTuAccount::where('id', $tuAccountId)->first();
        $subType = $tuAccount->sub_type;
        $loanType = strtolower($tuAccount->loan_type);
        $dateClose = $tuAccount->date_closed;
        $accountType = strtolower($tuAccount->account_type_description);
        $payStatus = strtolower($tuAccount->pay_status);
        $priceAccount = null;
        $priceAccountBlock = null;
        if ($subType == 'trade' && strpos($loanType, 'credit card') !== false
            && strpos($accountType, 'revolving') !== false) {
            if (strpos($payStatus, 'charged off') !== false) {
                $priceAccount =  $this->pricing->cc_charged_off;
                $priceAccountBlock = $this->pricing->cc_accnt_bloking;
            }
        }

        $dataPrice = [
            'inaccurate_price'=> $priceAccount,
            'not_mine_type'=> $priceAccountBlock,
        ];

        return $dataPrice;
    }
    public function eqAccountPrice($affiliate, $bureau, $eqAccountId)
    {
        $eqAccount = ClientReportExAccount::where('id', $eqAccountId)->first();
        dd($eqAccount);
        dd($affiliate,  $bureau, $eqAccountId);
    }

    public function disputeType()
    {
//        $ratingArray = str_split($rating);
//        if(in_array('6', $ratingArray)){
//            $disputed = 'REGULAR CREDIT CARD REGULAR CHARGED OFF';
//        }else{
//            $disputed = 'CREDIT CARD IRREGULAR CHARGED OFF';
//        }
    }

}
