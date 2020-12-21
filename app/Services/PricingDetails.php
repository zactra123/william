<?php

namespace App\Services;

use App\ClientReportEqAccount;
use App\ClientReportEqPublicRecord;
use App\ClientReportExAccount;
use App\ClientReportExPublicRecord;
use App\ClientReportTuAccount;
use App\ClientReportTuPublicRecord;
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
        $type = $exAccount->account_type();

        $priceInaccurate = null;
        $priceNotMine = null;

        if($type == "CA"){
            $price = $this->collectionPricing($exAccount->balance);
            $priceInaccurate = $price;
            $priceNotMine =$price;
        }elseif($type == "CC"){

        }elseif($type == "AUTO"){

        }elseif($type == "PERSONAL LOAN"){

        }elseif($type == "MORTGAGE"){

        }elseif($type == "STUDENT LOAN"){

        }elseif($type == "UTILITY"){
            $priceInaccurate = $this->utility;
            $priceNotMine = $this->utility;

        }elseif($type == "PUBLIC RECORD"){
            $priceInaccurate = $this->public_recorde;
            $priceNotMine = $this->public_recorde;
        }elseif($type == "UNKNOWN"){
            $priceInaccurate = $this->unknown;
            $priceNotMine = $this->unknown;
        }
        $dataPrice = [
            'inaccurate_price'=> $priceInaccurate,
            'not_mine_type'=> $priceNotMine,
        ];

        return $dataPrice;



        dd($type);

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
            'inaccurate'=> $priceAccount,
            'not_mine'=> $priceAccountBlock,
        ];

        dd($dataPrice);
        return $dataPrice;
    }

    public function tuAccountPrice( $bureau, $tuAccountId)
    {
        $tuAccount = ClientReportTuAccount::where('id', $tuAccountId)->first();
        $type = $tuAccount->account_type();

        $priceInaccurate = null;
        $priceNotMine = null;

        if($type == "CA"){
            $price = $this->collectionPricing($tuAccount->original_amount);
            $priceInaccurate = $price;
            $priceNotMine =$price;
        }elseif($type == "CC"){
            $priceType = $this->priceTypeTu($tuAccount);
            switch ($priceType) {
                case  'BLOCKING': $inaccurate =  $this->pricing->cc_blocking; break;
                case  'LATE': $inaccurate =  $this->pricing->cc_late;
            }
            $priceInaccurate = $inaccurate;
            $priceNotMine = $this->pricing->auto_blocking;

        }elseif($type == "AUTO"){
            $priceType = $this->priceTypeTu($tuAccount);
            switch ($priceType) {
                case  'BLOCKING': $inaccurate =  $this->pricing->auto_blocking; break;
                case  'LATE': $inaccurate =  $this->pricing->auto_late;
            }
            $priceInaccurate = $inaccurate;
            $priceNotMine = $this->pricing->auto_blocking;

        }elseif($type == "PERSONAL LOAN"){
            $priceType = $this->priceTypeTu($tuAccount);
            switch ($priceType) {
                case  'BLOCKING': $inaccurate =  $this->pricing->p_loan_blocking; break;
                case  'LATE': $inaccurate =  $this->pricing->p_loan_late;
            }
            $priceInaccurate = $inaccurate;
            $priceNotMine = $this->pricing->p_loan_blocking;

        }elseif($type == "MORTGAGE"){
            $priceType = $this->priceTypeTu($tuAccount);
            switch ($priceType) {
                case  'BLOCKING': $inaccurate =  $this->pricing->mortgage_blocking; break;
                case  'LATE': $inaccurate =  $this->pricing->mortgage_late;
            }
            $priceInaccurate = $inaccurate;
            $priceNotMine = $this->pricing->mortgage_blocking;

        }elseif($type == "STUDENT LOAN"){
            $priceType = $this->priceTypeTu($tuAccount);
            switch ($priceType) {
                case  'BLOCKING': $inaccurate =  $this->pricing->student_blocking; break;
                case  'LATE': $inaccurate =  $this->pricing->student_late;
            }
            $priceInaccurate = $inaccurate;
            $priceNotMine = $this->pricing->student_blocking;

        }elseif($type == "UTILITY"){
            $priceInaccurate = $this->pricing->utility;
            $priceNotMine = $this->pricing->utility;

        }elseif($type == "PUBLIC RECORD"){
            $priceInaccurate = $this->pricing->public_recorde;
            $priceNotMine = $this->pricing->public_recorde;
        }elseif($type == "UNKNOWN"){
            $priceInaccurate = $this->pricing->unknown;
            $priceNotMine = $this->pricing->unknown;
        }
        $dataPrice = [
            'inaccurate_price'=> $priceInaccurate,
            'not_mine_type'=> $priceNotMine,
        ];

        return $dataPrice;
//        $subType = $tuAccount->sub_type;
//        $loanType = strtolower($tuAccount->loan_type);
//        $dateClose = $tuAccount->date_closed;
//        $accountType = strtolower($tuAccount->account_type_description);
//        $payStatus = strtolower($tuAccount->pay_status);
//        $priceAccount = null;
//        $priceAccountBlock = null;
//        if ($subType == 'trade' && strpos($loanType, 'credit card') !== false
//            && strpos($accountType, 'revolving') !== false) {
//            if (strpos($payStatus, 'charged off') !== false) {
//                $priceAccount =  $this->pricing->cc_charged_off;
//                $priceAccountBlock = $this->pricing->cc_accnt_bloking;
//            }
//        }
//
//        $dataPrice = [
//            'inaccurate_price'=> $priceAccount,
//            'not_mine_type'=> $priceAccountBlock,
//        ];
//
//        return $dataPrice;
    }

    public function eqAccountPrice($bureau, $eqAccountId)
    {
        $eqAccount = ClientReportEqAccount::where('id', $eqAccountId)->first();
        $type = $eqAccount->account_type();
        $priceInaccurate = null;
        $priceNotMine = null;

        if($type == "CA"){
            $priceInaccurate = $this->collection;
            $priceNotMine = $this->collection;
        }elseif($type == "CC"){
            $priceType = $this->priceTypeEq($eqAccount);
            switch ($priceType) {
                case  'BLOCKING': $inaccurate =  $this->pricing->cc_blocking; break;
                case  'LATE': $priceInaccurate =  $this->pricing->cc_late;
            }
            $priceInaccurate = $inaccurate;
            $priceNotMine = $this->pricing->cc_blocking;

        }elseif($type == "AUTO"){
            $priceType = $this->priceTypeEq($eqAccount);
            switch ($priceType) {
                case  'BLOCKING': $inaccurate =  $this->pricing->auto_blocking; break;
                case  'LATE': $priceInaccurate =  $this->pricing->auto_late;
            }
            $priceInaccurate = $inaccurate;
            $priceNotMine = $this->pricing->auto_blocking;

        }elseif($type == "PERSONAL LOAN"){
            $priceType = $this->priceTypeEq($eqAccount);
            switch ($priceType) {
                case  'BLOCKING': $inaccurate =  $this->pricing->p_loan_blocking; break;
                case  'LATE': $inaccurate =  $this->pricing->p_loan_late;
            }
            $priceInaccurate = $inaccurate;
            $priceNotMine = $this->pricing->p_loan_blocking;

        }elseif($type == "MORTGAGE"){
            $priceType = $this->priceTypeEq($eqAccount);
            switch ($priceType) {
                case  'BLOCKING': $inaccurate =  $this->pricing->mortgage_blocking; break;
                case  'LATE': $inaccurate =  $this->pricing->mortgage_late;
            }
            $priceInaccurate = $inaccurate;
            $priceNotMine = $this->pricing->mortgage_blocking;

        }elseif($type == "STUDENT LOAN"){
            $priceType = $this->priceTypeEqStudent($eqAccount);
            switch ($priceType) {
                case  'BLOCKING': $inaccurate =  $this->pricing->student_blocking; break;
                case  'LATE': $inaccurate =  $this->pricing->student_late;
            }
            $priceInaccurate = $inaccurate;
            $priceNotMine = $this->pricing->student_blocking;

        }elseif($type == "UTILITY"){
            $priceInaccurate = $this->pricing->utility;
            $priceNotMine = $this->pricing->utility;

        }elseif($type == "PUBLIC RECORD"){
            $priceInaccurate = $this->pricing->public_recorde;
            $priceNotMine = $this->pricing->public_recorde;
        }elseif($type == "UNKNOWN"){
            $priceInaccurate = $this->pricing->unknown;
            $priceNotMine = $this->pricing->unknown;
        }
        $dataPrice = [
            'inaccurate_price'=> $priceInaccurate,
            'not_mine_type'=> $priceNotMine,
        ];

        return $dataPrice;
    }

    public function exPublicRecordPrice($bureau, $exPublicRecordId)
    {
        $exPublicRecord = ClientReportExPublicRecord::where('id', $exPublicRecordId)->first();

        $priceInaccurate = $this->public_recorde;
        $priceNotMine = $this->public_recorde;
        $dataPrice = [
            'inaccurate_price'=> $priceInaccurate,
            'not_mine_type'=> $priceNotMine,
        ];

        return $dataPrice;
    }

    public function tuPublicRecordPrice($bureau, $tuPublicRecordId)
    {
        $tuPublicRecord = ClientReportTuPublicRecord::where('id', $tuPublicRecordId)->first();
        $pricePublicRecord = null;

        $priceInaccurate = $this->public_recorde;
        $priceNotMine = $this->public_recorde;
        $dataPrice = [
            'inaccurate_price'=> $priceInaccurate,
            'not_mine_type'=> $priceNotMine,
        ];

        return $dataPrice;

    }

    public function eqPublicRecordPrice($bureau, $eqPublicRecordId)
    {
        $eqPublicRecord = ClientReportEqPublicRecord::where('id', $$eqPublicRecordId)->first();
        $priceInaccurate = $this->public_recorde;
        $priceNotMine = $this->public_recorde;
        $dataPrice = [
            'inaccurate_price'=> $priceInaccurate,
            'not_mine_type'=> $priceNotMine,
        ];

        return $dataPrice;
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

    public function collectionPricing($balance){

        return '1000';

    }

    public function priceTypeEq($account)
    {
        if(strpos($account->account_status, 'close')!== false){
            return 'BLOCKING';
        }else{
           $late30 =  $account->late_30_count;
           $late60 =  $account->late_30_count;
           $late90 =  $account->late_30_count;

           if($late30 < 2 && $late60 == 0 && $late90 == 0){
               return 'LATE';
           }else{
               return 'BLOCKING';
           }
        }
    }

    public function priceTypeEqStudent($account)
    {
        if(strpos($account->account_status, 'close')!== flase){
            return 'BLOCKING';
        }else{
            $late30 =  $account->late_30_count;
            $late60 =  $account->late_30_count;
            $late90 =  $account->late_30_count;

            if(($late30 < 4 || $late60 < 3) && $late90 == 0){
                return 'LATE';
            }else{
                return 'BLOCKING';
            }
        }

    }

    public function priceTypeTu($account)
    {
        $rating  =$account->rating;
        $ratingArray = str_split($rating);
        $countRating = array_count_values($ratingArray);
        $dateClose = $account->date_closed;

        $late30 = isset($countRating[2])?$countRating[2]:null;
        $late60 = isset($countRating[3])?$countRating[3]:null;
        $late90 = isset($countRating[4])?$countRating[4]:null;
        $late150 = isset($countRating[5])?$countRating[5]:null;
        $late150up = isset($countRating[6])?$countRating[6]:null;
        $unrated = isset($countRating["X"])?$countRating["X"]:null;
        $unratedR = isset($countRating["Y"])?$countRating["Y"]:null;
        $voluntary = isset($countRating["J"])?$countRating["J"]:null;
        $repossession = isset($countRating["K"])?$countRating["K"]:null;
        $collection= isset($countRating["G"])?$countRating["G"]:null;
        $chargeOff= isset($countRating["L"])?$countRating["L"]:null;
        $foreclosure= isset($countRating["H"])?$countRating["H"]:null;

        if($dateClose!== false){
            return 'BLOCKING';
        }else{

           if($late30 < 2 && ($late60 == 0 && $late90 == 0 && $late150 == 0 && $late150up == 0 && $unrated == 0
                   && $unratedR == 0 && $voluntary == 0 && $repossession == 0 && $collection == 0 && $chargeOff == 0 &&
                   $foreclosure == 0)){
               return 'LATE';
           }else{
               return 'BLOCKING';
           }
        }
    }

    public function priceTypeTuStudent($account)
    {
        $rating  =$account->rating;
        $ratingArray = str_split($rating);
        $countRating = array_count_values($ratingArray);
        $dateClose = $account->date_closed;

        $late30 = isset($countRating[2])?$countRating[2]:null;
        $late60 = isset($countRating[3])?$countRating[3]:null;
        $late90 = isset($countRating[4])?$countRating[4]:null;
        $late150 = isset($countRating[5])?$countRating[5]:null;
        $late150up = isset($countRating[6])?$countRating[6]:null;
        $unrated = isset($countRating["X"])?$countRating["X"]:null;
        $unratedR = isset($countRating["Y"])?$countRating["Y"]:null;
        $voluntary = isset($countRating["J"])?$countRating["J"]:null;
        $repossession = isset($countRating["K"])?$countRating["K"]:null;
        $collection= isset($countRating["G"])?$countRating["G"]:null;
        $chargeOff= isset($countRating["L"])?$countRating["L"]:null;
        $foreclosure= isset($countRating["H"])?$countRating["H"]:null;

        if($dateClose!== false){
            return 'BLOCKING';
        }else{

            if(($late30 < 4 || $late60 < 3) && ($late90 == 0 && $late150 == 0 && $late150up == 0 && $unrated == 0
                    && $unratedR == 0 && $voluntary == 0 && $repossession == 0 && $collection == 0 && $chargeOff == 0 &&
                    $foreclosure == 0)){
                return 'LATE';
            }else{
                return 'BLOCKING';
            }
        }

    }



}
