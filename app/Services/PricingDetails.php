<?php

namespace App\Services;

use App\ClientReportEqAccount;
use App\ClientReportEqPublicRecord;
use App\ClientReportExAccount;
use App\ClientReportExPublicRecord;
use App\ClientReportTuAccount;
use App\ClientReportTuPublicRecord;
use App\DisputesPricing;
use Illuminate\Support\Facades\DB;

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
        $dataPrice = [
            'inaccurate'=> $this->pricing->personal_info,
            'not_mine'=> $this->pricing->personal_info,
        ];
        return $dataPrice;
    }

    public function statement()
    {
        $dataPrice = [
            'inaccurate'=> $this->pricing->fraud_alerts,
            'not_mine'=> $this->pricing->fraud_alerts,
        ];
        return $dataPrice;
    }

    public function inquiries()
    {
        $dataPrice = [
            'inaccurate'=> $this->pricing->inquiries,
            'not_mine'=> $this->pricing->inquiries,
        ];
        return $dataPrice;
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
            $priceType = $this->priceExType($exAccount);
            $priceInaccurate = $priceType == "BLOCKING" ? $this->pricing->cc_blocking : $this->pricing->cc_late;
            $priceNotMine = $this->pricing->auto_blocking;

        }elseif($type == "AUTO"){
            $priceType = $this->priceExType($exAccount);
            $priceInaccurate = $priceType == "BLOCKING" ? $this->pricing->auto_blocking : $this->pricing->auto_late;
            $priceNotMine = $this->pricing->auto_blocking;

        }elseif($type == "PERSONAL LOAN"){
            $priceType = $this->priceExType($exAccount);
            $priceInaccurate = $priceType == "BLOCKING" ? $this->pricing->p_loan_blocking : $this->pricing->p_loan_late;
            $priceNotMine = $this->pricing->p_loan_blocking;

        }elseif($type == "MORTGAGE"){
            $priceType = $this->priceExType($exAccount);
            $priceInaccurate = $priceType == "BLOCKING" ? $this->pricing->mortgage_blocking : $this->pricing->mortgage_late ;
            $priceNotMine = $this->pricing->mortgage_blocking;

        }elseif($type == "STUDENT LOAN"){
            $priceType = $this->priceExStudentType($exAccount);
            $priceInaccurate = $priceType == "BLOCKING" ?$this->pricing->student_blocking:$this->pricing->student_late;
            $priceNotMine = $this->pricing->student_blocking;

        }elseif($type == "UTILITY"){
            $priceInaccurate = $this->pricing->utility_blocking;
            $priceNotMine = $this->pricing->utility_blocking;
        }elseif($type == "PUBLIC RECORD"){
            $priceInaccurate = $this->pricing->public_recorde;
            $priceNotMine = $this->pricing->public_recorde;
        }elseif($type == "UNKNOWN"){
            $priceInaccurate = $this->pricing->unknown;
            $priceNotMine = $this->pricing->unknown;
        }
        $dataPrice = [
            'inaccurate'=> $priceInaccurate,
            'not_mine'=> $priceNotMine,
        ];

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
            $priceInaccurate = $priceType == "BLOCKING" ? $this->pricing->cc_blocking : $this->pricing->cc_late;
            $priceNotMine = $this->pricing->auto_blocking;

        }elseif($type == "AUTO"){
            $priceType = $this->priceTypeTu($tuAccount);
            $priceInaccurate = $priceType == "BLOCKING" ? $this->pricing->auto_blocking : $this->pricing->auto_late;
            $priceNotMine = $this->pricing->auto_blocking;

        }elseif($type == "PERSONAL LOAN"){
            $priceType = $this->priceTypeTu($tuAccount);
            $priceInaccurate = $priceType == "BLOCKING" ? $this->pricing->p_loan_blocking : $this->pricing->p_loan_late;
            $priceNotMine = $this->pricing->p_loan_blocking;

        }elseif($type == "MORTGAGE"){
            $priceType = $this->priceTypeTu($tuAccount);
            $priceInaccurate = $priceType == "BLOCKING" ? $this->pricing->mortgage_blocking : $this->pricing->mortgage_late ;
            $priceNotMine = $this->pricing->mortgage_blocking;

        }elseif($type == "STUDENT LOAN"){
            $priceType = $this->priceTypeTuStudent($tuAccount);
            $priceInaccurate = $priceType == "BLOCKING" ?$this->pricing->student_blocking:$this->pricing->student_late;
            $priceNotMine = $this->pricing->student_blocking;

        }elseif($type == "UTILITY"){
            $priceInaccurate = $this->pricing->utility_blocking;
            $priceNotMine = $this->pricing->utility_blocking;
        }elseif($type == "PUBLIC RECORD"){
            $priceInaccurate = $this->pricing->public_recorde;
            $priceNotMine = $this->pricing->public_recorde;
        }elseif($type == "UNKNOWN"){
            $priceInaccurate = $this->pricing->unknown;
            $priceNotMine = $this->pricing->unknown;
        }
        $dataPrice = [
            'inaccurate'=> $priceInaccurate,
            'not_mine'=> $priceNotMine,
        ];

        return $dataPrice;
    }

    public function eqAccountPrice($bureau, $eqAccountId)
    {
        $eqAccount = ClientReportEqAccount::where('id', $eqAccountId)->first();
        $type = $eqAccount->account_type();
        $priceInaccurate = null;
        $priceNotMine = null;

        if($type == "CA"){
            $price = $this->collectionPricing($eqAccount->balance);
            $priceInaccurate = $price;
            $priceNotMine =$price;
        }elseif($type == "CC"){
            $priceType = $this->priceTypeEq($eqAccount);
            $priceInaccurate = $priceType == 'BLOCKING'?$this->pricing->cc_blocking:$this->pricing->cc_late;
            $priceNotMine = $this->pricing->cc_blocking;
        }elseif($type == "AUTO"){
            $priceType = $this->priceTypeEq($eqAccount);
            $priceInaccurate = $priceType == 'BLOCKING'?$this->pricing->auto_blocking:$this->pricing->auto_late;
            $priceNotMine = $this->pricing->auto_blocking;
        }elseif($type == "PERSONAL LOAN"){
            $priceType = $this->priceTypeEq($eqAccount);
            $priceInaccurate = $priceType == 'BLOCKING'?$this->pricing->p_loan_blocking:$this->pricing->p_loan_late;
            $priceNotMine = $this->pricing->p_loan_blocking;
        }elseif($type == "MORTGAGE"){
            $priceType = $this->priceTypeEq($eqAccount);
            $priceInaccurate = $priceType == 'BLOCKING'?$this->pricing->mortgage_blocking:$this->pricing->mortgage_late;
            $priceNotMine = $this->pricing->mortgage_blocking;
        }elseif($type == "STUDENT LOAN"){
            $priceType = $this->priceTypeEqStudent($eqAccount);
            $priceInaccurate = $priceType == 'BLOCKING'? $this->pricing->student_blocking:$this->pricing->student_late;
            $priceNotMine = $this->pricing->student_blocking;
        }elseif($type == "UTILITY"){
            $priceInaccurate = $this->pricing->utility_blocking;
            $priceNotMine = $this->pricing->utility_blocking;
        }elseif($type == "PUBLIC RECORD"){
            $priceInaccurate = $this->pricing->public_recorde;
            $priceNotMine = $this->pricing->public_recorde;
        }elseif($type == "UNKNOWN"){
            $priceInaccurate = $this->pricing->unknown;
            $priceNotMine = $this->pricing->unknown;
        }
        $dataPrice = [
            'inaccurate'=> $priceInaccurate,
            'not_mine'=> $priceNotMine,
        ];

        return $dataPrice;
    }

    public function publicRecordPrice()
    {
        $priceInaccurate = $this->public_recorde;
        $priceNotMine = $this->public_recorde;
        $dataPrice = [
            'inaccurate'=> $priceInaccurate,
            'not_mine'=> $priceNotMine,
        ];

        return $dataPrice;
    }

    public function collectionPricing($balance){

        foreach ($this->pricing->collection as $value){
            $min_pricing_condition = $value['minimum'] < $balance;
            $max_pricing_condition = isset($value['maximum'])?$value['minimum'] > $balance : true;
            if ($min_pricing_condition && $max_pricing_condition) {
                $price = $value['additional_fee'] + $balance * ($value['percentage']/100);
                break;
            }
        }
        return $price;
    }

    public function priceTypeEq($account)
    {
        if(strpos($account->account_status, 'close')!== false){
            return 'BLOCKING';
        }

        $late30 =  $account->late_30_count;
        $late60 =  $account->late_60_count;
        $late90 =  $account->late_90_count;

        if($late30 < 3 && $late60 == 0 && $late90 == 0){
           return 'LATE';
        }
       return 'BLOCKING';
    }

    public function priceTypeEqStudent($account)
    {
        if (strpos($account->account_status, 'close')!== flase) {
            return 'BLOCKING';
        }

        $late30 =  $account->late_30_count;
        $late60 =  $account->late_30_count;
        $late90 =  $account->late_30_count;

        if(($late30 < 4 || $late60 < 3) && $late90 == 0){
            return 'LATE';
        }
        return 'BLOCKING';
    }

    public function priceTypeTu($account)
    {
        if ($account->date_closed != null) {
            return 'BLOCKING';
        }

        $lates = $this->tuLates($account->rating);

        if(
            $lates["30"] < 3&& $lates["60"] == 0  &&
            $lates["90"] == 0 && $lates["150"] == 0 &&
            $lates["150+"] == 0 && $lates["unrated"] == 0 &&
            $lates["unratedR"] == 0 && $lates["voluntary"] == 0 &&
            $lates["repossession"] == 0 && $lates["collection"] == 0 &&
            $lates["chargeOff"] == 0 && $lates["foreclosure"] == 0
        ) {
            return 'LATE';
        }

       return 'BLOCKING';
    }

    public function priceTypeTuStudent($account)
    {
        if ($account->date_closed != null) {
            return 'BLOCKING';
        }
        $lates = $this->tuLates($account->rating);

        if(
            $lates["30"] < 4 && $lates["60"] < 3  &&
            $lates["90"] == 0 && $lates["150"] == 0 &&
            $lates["150+"] == 0 && $lates["unrated"] == 0 &&
            $lates["unratedR"] == 0 && $lates["voluntary"] == 0 &&
            $lates["repossession"] == 0 && $lates["collection"] == 0 &&
            $lates["chargeOff"] == 0 && $lates["foreclosure"] == 0
            ) {
            return 'LATE';
        }
        return 'BLOCKING';
    }

    public function priceExType($account)
    {

        if(strpos($account->status, "open") !== false){
            return "BLOCKING";
        }

        $rating = $account->paymentHistories()->groupBy('status')->select(DB::Raw('COUNT(id) as count'), 'status')
            ->pluck('count', 'status')->toArray();

        $lates = $this->exLates($rating);

        if(
            $lates["30"] < 3 && $lates["60"] == 0  &&
            $lates["90"] == 0 && $lates["120"] == 0 &&
            $lates["150"] == 0 && $lates["180"] == 0 &&
            $lates["CRD"] == 0 && $lates["FS"] == 0 &&
            $lates["F"] == 0 && $lates["VS"] == 0 &&
            $lates["R"] == 0 && $lates["PBC"] == 0 &&
            $lates["IC"] == 0 && $lates["G"] == 0 &&
            $lates["D"] == 0 && $lates["C"] == 0 &&
            $lates["CO"] == 0 && $lates["CLS"] == 0
        ) {
            return 'LATE';
        }

        return 'BLOCKING';
    }

    public function priceExStudentType($account)
    {
        if(strpos($account->status, "open") !== false){
            return "BLOCKING";
        }

        $rating = $account->paymentHistories()->groupBy('status')->select(DB::Raw('COUNT(id) as count'), 'status')
            ->pluck('count', 'status')->toArray();

        $lates = $this->exLates($rating);

        if(
            $lates["30"] < 4 && $lates["60"] < 3  &&
            $lates["90"] == 0 && $lates["120"] == 0 &&
            $lates["150"] == 0 && $lates["180"] == 0 &&
            $lates["CRD"] == 0 && $lates["FS"] == 0 &&
            $lates["F"] == 0 && $lates["VS"] == 0 &&
            $lates["R"] == 0 && $lates["PBC"] == 0 &&
            $lates["IC"] == 0 && $lates["G"] == 0 &&
            $lates["D"] == 0 && $lates["C"] == 0 &&
            $lates["CO"] == 0 && $lates["CLS"] == 0
        ) {
            return 'LATE';
        }

        return 'BLOCKING';
    }

    public function tuLates($rating){
        $ratingArray = str_split($rating);
        $countRating = array_count_values($ratingArray);
        $lates = [];
        $lates["30"] = isset($countRating[2])?$countRating[2]:null;
        $lates["60"] = isset($countRating[3])?$countRating[3]:null;
        $lates["90"] = isset($countRating[4])?$countRating[4]:null;
        $lates["150"] = isset($countRating[5])?$countRating[5]:null;
        $lates["150+"] = isset($countRating[6])?$countRating[6]:null;
        $lates["unrated"] = isset($countRating["X"])?$countRating["X"]:null;
        $lates["unratedR"] = isset($countRating["Y"])?$countRating["Y"]:null;
        $lates["voluntary"] = isset($countRating["J"])?$countRating["J"]:null;
        $lates["repossession"] = isset($countRating["K"])?$countRating["K"]:null;
        $lates["collection"] = isset($countRating["G"])?$countRating["G"]:null;
        $lates["chargeOff"] = isset($countRating["L"])?$countRating["L"]:null;
        $lates["foreclosure"] = isset($countRating["H"])?$countRating["H"]:null;

        return $lates;
    }

    public function exLates($rating)
    {
        $lates = [];
        $lates["30"] = isset($rating['30'])?$rating['30']:null;
        $lates["60"] = isset($rating['60'])?$rating['60']:null;
        $lates["90"] = isset($rating['90'])?$rating['90']:null;
        $lates["120"] = isset($rating['120'])?$rating['120']:null;
        $lates["150"] = isset($rating['150'])?$rating['150']:null;
        $lates["180"] = isset($rating["180"])?$rating["180"]:null;
        $lates["CRD"] = isset($rating["CRD"])?$rating["Y"]:null;
        $lates["FS"] = isset($rating["FS"])?$rating["FS"]:null;
        $lates["F"] = isset($rating["F"])?$rating["F"]:null;
        $lates["VS"] = isset($rating["VS"])?$rating["VS"]:null;
        $lates["R"] = isset($rating["R"])?$rating["R"]:null;
        $lates["PBC"] = isset($rating["PBC"])?$rating["PBC"]:null;
        $lates["IC"] = isset($rating["IC"])?$rating["IC"]:null;
        $lates["G"] = isset($rating["G"])?$rating["G"]:null;
        $lates["D"] = isset($rating["D"])?$rating["D"]:null;
        $lates["C"] = isset($rating["C"])?$rating["C"]:null;
        $lates["CO"] = isset($rating["CO"])?$rating["CO"]:null;
        $lates["CLS"] = isset($rating["CLS"])?$rating["CLS"]:null;

        return $lates;
    }
}
