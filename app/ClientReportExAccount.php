<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ClientReportExAccount extends Model
{
    private $ACCOUNT_TYPES = [
        "CC" => ['credit card', 'charge card', 'business credit'],
        "AUTO" => ['auto lease', 'auto loan'],
        "PERSONAL LOAN" => ['unsecured', 'secured loan', 'line of credit',  'note loan', 'sales contract'],
        "MORTGAGE" => ['mortgage', 'fha mortgage', 'home equity', 'rental', 'secured loc'],
        "CA"=>['collection', 'debt buyer'],
        "STUDENT LOAN" =>['education','education loan'],
        "UTILITY " =>['utility'],
        "CELL PHONE" =>['cell phone'],
        "PUBLIC RECORD" => ['child support', 'family support'],
    ];

    protected $fillable = [
        'client_report_id',
        'is_dispute',
        'under_dispute',
        'negative_item',
        'opened_date',
        'report_started_date',
        'status_date',
        'last_reported_date',
        'type',
        'classification',
        'term',
        'monthly_payment',
        'responsibility',
        'credit_limit',
        'credit_limit_label',
        'high_balance',
        'source_name',
        'source_id',
        'source_address_street',
        'source_address_city',
        'source_address_state',
        'source_address_zip',
        'source_address_phone',
        'source_address_phone_type',
        'ain',
        'original_creditor',
        'sold_to',
        'purchased_from',
        'mortgage_id',
        'recent_balance_date',
        'recent_balance_amount',
        'recent_balance_pay_amount',
        'status',
        'statement',
        'reinvestigation',
        "secondary_agency_name_as_title",
        "secondary_agency_id",
        "on_record_until",
        "complianceCode",
        "subscriberStatement"
    ];

    public function clientReport()
    {
        return $this->belongsTo('App\ClientReport');
    }

    public function limitHighBalance()
    {
        return $this->hasMany('App\ClientReportExAccountsLimitHighBalance');
    }

    public function balanceHistories()
    {
        return $this->hasMany('App\ClientReportExAccountsBalanceHistory');
    }

    public function payStates()
    {
        return $this->hasMany('App\ClientReportExAccountsPayState');
    }

    public function paymentHistories()
    {
        return $this->hasMany('App\ClientReportExAccountsPaymentHistory');
    }

    public function showDetails()
    {
        $berau = ClientReport::REPORT_TYPES[$this->clientReport->type];
        $name =  $this->source_name.' #'.$this->source_id;
        return "$berau : $name";
    }

    public function dispute()
    {
        return $this->belongsTo("App\Disputable", 'id','disputable_id')->where('disputables.disputable_type', 'App\\ClientReportExAccount');
    }

    public function account_type()
    {
        $type = strtolower($this->type);
        foreach ($this->ACCOUNT_TYPES as $key => $accounts) {
            foreach($accounts as $account){
                if(strpos($account, $type) !== false){
                    return $key;
                }
            }

        }
        return "UNKNOWN";
    }

    /**
     *
     *
     * return $status(string), $need_attention(array)
     */
    public function getTodoAttributes()
    {
        $status = '';
        $need_attention = [];
        $openClose = strpos(strtolower($this->status), "close") !== false ? "Close" : "Open";

        $countByType = $this->paymentHistories()->groupBy('status')->select(DB::Raw('COUNT(id) as count'), 'status')
            ->pluck('count', 'status')->toArray();
        $payments = $this->paymentHistories()->orderBy('id', 'DESC')->get();
        $account_statueses = array_keys($countByType);
        $chargeOff = false;


        switch ($this->account_type()) {
            case "CC":
                $regularOrNot = $this->getRegular();
                $charge = !is_null($regularOrNot['regular_status'])?true:false;
                $name_attention = $this->need_attention_charge_off($charge);
                $status = (!is_null($regularOrNot['regular_status']) || !is_null($name_attention['name_part']))?$regularOrNot['regular_status']." ".$name_attention['name_part']:null;
                $need_attention = !is_null($regularOrNot["need_attention"])?array_merge($need_attention, $regularOrNot["need_attention"]):$need_attention;
                $need_attention = !is_null($name_attention["need_attention"])?array_merge($need_attention, $name_attention["need_attention"]):$need_attention;
                break;
            case "AUTO":
                $regularOrNot = $this->getRegular();
                $charge = !is_null($regularOrNot['regular_status'])?true:false;
                $name_attention = $this->need_attention_charge_off($charge);
                $status = (!is_null($regularOrNot['regular_status']) || !is_null($name_attention['name_part']))?$regularOrNot['regular_status']." ".$name_attention['name_part']:null;
                $need_attention = !is_null($regularOrNot["need_attention"])?array_merge($need_attention, $regularOrNot["need_attention"]):$need_attention;
                $need_attention = !is_null($name_attention["need_attention"])?array_merge($need_attention, $name_attention["need_attention"]):$need_attention;
                break;
            case "PERSONAL LOAN":
                $regularOrNot = $this->getRegular();
                $charge = !is_null($regularOrNot['regular_status'])?true:false;
                $name_attention = $this->need_attention_charge_off($charge);
                $status = (!is_null($regularOrNot['regular_status']) || !is_null($name_attention['name_part']))?$regularOrNot['regular_status']." ".$name_attention['name_part']:null;
                $need_attention = !is_null($regularOrNot["need_attention"])?array_merge($need_attention, $regularOrNot["need_attention"]):$need_attention;
                $need_attention = !is_null($name_attention["need_attention"])?array_merge($need_attention, $name_attention["need_attention"]):$need_attention;
                break;
            case "MORTGAGE":
                $mortgage_charge_off = ClientReportExAccountsPaymentHistory::NEGATIVE_TYPES["mortgage"];
                foreach ($mortgage_charge_off as $type) {
                    if (in_array(strtoupper($type), $account_statueses)) {
                        $name = [
                            "CRD" => "CREDITOR RECEIVED DEED",
                            "FS" => "FORECLOSURE STARTED",
                            "F" =>"FORECLOSED"
                        ];
                        $payment_statuses = $payments->pluck("status", 'id')->toArray();
                        $prev = $this->get_prev($payment_statuses, array_search($type, $payment_statuses));

//                      // in the case when account type is mortgage the minimum late are 120 before charge off
                        if ($prev["value"] != 120) {
                            if (in_array(strtoupper($prev['value']), $mortgage_charge_off)) {
                                $prev = $this->get_prev($payment_statuses, array_search($type, $payment_statuses));

                                if ($prev["value"] != 120) {
                                    $status = strtoupper("Irregular {$this->responsibility} {$this->type}  {$name[$type]}");
                                    $chargeOff = true;
                                    $prev = $payments->find($prev["key"]);
                                    $date = \DateTime::createFromFormat("Y-M-d", "{$prev['year']}-{$prev['month']}-{$prev['day']}")
                                        ->format("M/Y");
                                    $need_attention[] = [
                                        "text" => "{$date} MISSING FULL 180 DAYS LATE BEFORE {$name}",
                                        "case" => 11,
                                        "id" => $prev["id"],
                                    ];
                                } else {
                                    $status = strtoupper("Regular {$this->responsibility} {$this->type} {$name[$type]}");
                                    $chargeOff = true;
                                }
                                break;
                            }
                        }
                        $status = strtoupper("Regular {$this->responsibility} {$this->type} {$name[$type]}");
                        $chargeOff = true;
                        break;
                    }
                }
                break;
            case "STUDENT LOAN":
                $regularOrNot = $this->getRegular();
                $charge = !is_null($regularOrNot['regular_status'])?true:false;
                $name_attention = $this->need_attention_charge_off($charge);
                $status = (!is_null($regularOrNot['regular_status']) || !is_null($name_attention['name_part']))?$regularOrNot['regular_status']." ".$name_attention['name_part']:null;
                $need_attention = !is_null($regularOrNot["need_attention"])?array_merge($need_attention, $regularOrNot["need_attention"]):$need_attention;
                $need_attention = !is_null($name_attention["need_attention"])?array_merge($need_attention, $name_attention["need_attention"]):$need_attention;
                break;
            case "UTILITY":
            case "CELL PHONE":
            case "PUBLIC RECORD":
                $charge_off_types = ClientReportExAccountsPaymentHistory::NEGATIVE_TYPES["collection_charge_off"];
                foreach ($charge_off_types as $type) {
                    if (in_array($type, $account_statueses)) {
                        $name_attention = $this->need_attention_charge_off();
                        $status = strtoupper("{$this->type} charge off")." ".$name_attention['name_part'];
                        $need_attention = !is_null($name_attention["need_attention"])?array_merge($need_attention, $name_attention["need_attention"]):$need_attention;
                    }
                }
                break;
        }
        $negative_late_statuses = ClientReportExAccountsPaymentHistory::NEGATIVE_TYPES["lates"];
        // if not Charge OFF Status get from payment histories as late
        if (empty($status)) {
            // getting late status for account dispute reason
            $late_type = 'WITHOUT LATE';
            foreach (array_reverse($negative_late_statuses) as $late_status) {
                if (in_array($late_status, $account_statueses)) {
                    if ($late_status != 30) {
                        $late_type = "{$late_status}-DAYS LATE";
                        break;
                    } else {
//                        $late_type =  count($account_statueses['30']) == 1 ? "SIMPLE 30-DAYS LATE" : count($account_statueses['30']) . "x 30-DAYS LATE";
                        $late_type =  $countByType['30'] == 1 ? "SIMPLE 30-DAYS LATE" : $countByType['30'] . "x 30-DAYS LATE";
                    }
                }
            }
            $status = strtoupper("$openClose {$this->responsibility} {$this->type} {$late_type}");
        }
        foreach($payments->toArray() as $key=>&$payment) {
            if (in_array($payment["status"], ["OK", "CLS", "ND"])) {
                continue;
            }
            switch ($payment["status"]) {
                case "30":
                   continue;
                    break;
                case "60":
                    if (empty($payments[$key-1]['status']) || $payments[$key-1]['status'] == 'OK'){
                        $date = \DateTime::createFromFormat("Y-M-d", "{$payment['year']}-{$payment['month']}-{$payment['day']}")
                            ->format("M/Y");
                        $need_attention[] = [
                            "text" => "{$date} 60-DATES LATE WITHOUT 30-DAYS LATE",
                            "case" => 1,
                            "id" => $payment["id"],
                        ];

                    }

                    if (!empty($payments[$key-1]['status']) && $payments[$key-1]['status'] == "60"){
                        $payment['consecutive'] = true;
                        if (!empty($payments[$key-1]['consecutive'])){
                            continue;
                        }
                        $date = \DateTime::createFromFormat("Y-M-d", "{$payments[$key-1]['year']}-{$payments[$key-1]['month']}-{$payments[$key-1]['day']}")
                            ->format("M/Y");
                        $need_attention[] = [
                            "text" => "{$date} CONSECUTIVE 60-DAYS LATE",
                            "case" => 2,
                            "id" => $payments[$key-1]["id"],
                        ];
                    }

                    break;
                case "90":
                    if (empty($payments[$key-1]['status']) || !in_array($payments[$key-1]['status'], [60, 90])){
                        $payment['consecutive'] = true;
                        if (!empty($payments[$key-1]['consecutive'])){
                            continue;
                        }
                        $date = \DateTime::createFromFormat("Y-M-d", "{$payment['year']}-{$payment['month']}-{$payment['day']}")
                            ->format("M/Y");
                        $need_attention[] = [
                            "text" => "{$date} 90-DATES LATE WITHOUT 60-DAYS LATE",
                            "case" => 3,
                            "id" => $payment["id"],
                        ];
                    }

                    if (!empty($payments[$key-1]['status']) && $payments[$key-1]['status'] == "90"){
                        $payment['consecutive'] = true;
                        if (!empty($payments[$key-1]['consecutive'])){
                            continue;
                        }
                        $date = \DateTime::createFromFormat("Y-M-d", "{$payments[$key-1]['year']}-{$payments[$key-1]['month']}-{$payments[$key-1]['day']}")
                            ->format("M/Y");
                        $need_attention[] = [
                            "text" => "{$date} CONSECUTIVE 90-DAYS LATE",
                            "case" => 4,
                            "id" => $payments[$key-1]["id"],
                        ];
                    }
                    break;
                case "120":
                    if (empty($payments[$key-1]['status']) || !in_array($payments[$key-1]['status'], [90, 120])){
                        $date = \DateTime::createFromFormat("Y-M-d", "{$payment['year']}-{$payment['month']}-{$payment['day']}")
                            ->format("M/Y");
                        $need_attention[] = [
                            "text" => "{$date} 120-DATES LATE WITHOUT 60-DAYS LATE",
                            "case" => 5,
                            "id" => $payment["id"],
                        ];
                    }
                    if (!empty($payments[$key-1]['status']) && $payments[$key-1]['status'] == "120"){
                        $payment['consecutive'] = true;
                        if (!empty($payments[$key-1]['consecutive'])){
                            continue;
                        }
                        $date = \DateTime::createFromFormat("Y-M-d", "{$payments[$key-1]['year']}-{$payments[$key-1]['month']}-{$payments[$key-1]['day']}")
                            ->format("M/Y");
                        $need_attention[] = [
                            "text" => "{$date} CONSECUTIVE 120-DAYS LATE",
                            "case" => 6,
                            "id" => $payments[$key-1]["id"],
                        ];
                    }
                    break;
                case "150":
                    if (empty($payments[$key-1]['status']) || !in_array($payments[$key-1]['status'], [120, 150])){
                        $date = \DateTime::createFromFormat("Y-M-d", "{$payment['year']}-{$payment['month']}-{$payment['day']}")
                            ->format("M/Y");
                        $need_attention[] = [
                            "text" => "{$date} 150-DATES LATE WITHOUT 120-DAYS LATE",
                            "case" => 7,
                            "id" => $payment["id"],
                        ];
                    }

                    if (!empty($payments[$key-1]['status']) && $payments[$key-1]['status'] == "150"){
                        $payment['consecutive'] = true;
                        if (!empty($payments[$key-1]['consecutive'])){
                            continue;
                        }
                        $date = \DateTime::createFromFormat("Y-M-d", "{$payments[$key-1]['year']}-{$payments[$key-1]['month']}-{$payments[$key-1]['day']}")
                            ->format("M/Y");
                        $need_attention[] = [
                            "text" => "{$date} CONSECUTIVE 150-DAYS LATE",
                            "case" => 8,
                            "id" => $payments[$key-1]["id"],
                        ];
                    }

                    break;
                case "180":
                    if (empty($payments[$key-1]['status']) || !in_array($payments[$key-1]['status'], [120, 150])){
                        $payment['consecutive'] = true;
                        if (!empty($payments[$key-1]['consecutive'])){
                            continue;
                        }
                        $date = \DateTime::createFromFormat("Y-M-d", "{$payment['year']}-{$payment['month']}-{$payment['day']}")
                            ->format("M/Y");
                        $need_attention[] = [
                            "text" => "{$date} 180-DATES LATE WITHOUT 150-DAYS LATE",
                            "case" => 9,
                            "id" => $payment["id"],
                        ];
                    }
                    if (!empty($payments[$key-1]['status']) && $payments[$key-1]['status'] == "180"){
                        $payment['consecutive'] = true;
                        if (!empty($payments[$key-1]['consecutive'])){
                            continue;
                        }
                        $date = \DateTime::createFromFormat("Y-M-d", "{$payments[$key-1]['year']}-{$payments[$key-1]['month']}-{$payments[$key-1]['day']}")
                            ->format("M/Y");
                        $need_attention[] = [
                            "text" => "{$date} CONSECUTIVE 180-DAYS LATE",
                            "case" => 10,
                            "id" => $payments[$key-1]["id"],
                        ];
                    }
                    break;
                case "D":
                    $date = \DateTime::createFromFormat("Y-M-d", "{$payment['year']}-{$payment['month']}-{$payment['day']}")
                        ->format("M/Y");
                    $need_attention[] = [
                        "text" => "{$date} D - STATUS IN PAYMENT HISTORY",
                        "case" => 7,
                        "id" => $payment["id"],
                    ];
            }
        }

        dd($status, $need_attention, 'zzzz');

        return ["status" => $status, "need_attention" => $need_attention];
    }



    private function get_prev($array, $key)
    {
         $currentKey = key($array);
         while ($currentKey !== null && $currentKey != $key) {
             next($array);
             $currentKey = key($array);
         }

         $value = prev($array);
         $key = key($array);

         return ['key' => $key, 'value' => $value];
    }
    private function need_attention_charge_off ($chargeOff)
    {
        $name_part = null;
        $need_attention = [];

        $status = $this->status;
        $reWrittenOff = "/([0-9\,\s]{2,})+written off/m";
        $rePastDue = "/([0-9\,\s]{2,})+past due as/m";
        preg_match($reWrittenOff, $status, $matchWrittenOff);
        preg_match($rePastDue, $status, $matchPastDue);

        $writtenOff = isset($matchWrittenOff[1])?trim(str_replace(",", "",$matchWrittenOff[1])):null;
        $pastDue = isset($matchPastDue[1])?trim(str_replace(",", "",$matchPastDue[1])):null;
        if($writtenOff != null && $pastDue == null){
            $pastDue = $writtenOff;
        }

        $creditLimit =  $this->credit_limit_label == "Credit Limit"?$this->credit_limit: null;

        $balance = str_replace(",", "", $this->recent_balance_amount);
        $highBalance =  $this->high_balance;

        if((!is_null($writtenOff) || !is_null($pastDue)) && !empty($balance)){

            if(($writtenOff != $pastDue) || ($pastDue != $balance) && (!is_null($writtenOff) && !is_null($pastDue))){

                $need_attention[] = [
                    "text" => "WRITTEN OFF, PAST DUE AND BALANCE ARE NOT EQUAL",
                    "case" => 12,
                ];

            }else{
                $name_part = $name_part == null ? strtoupper(" CHARGE OFF WRITTEN OFF AMOUNT IS EQUAL PAST DUE AND RECENT BALANCE"): $name_part;
            }

            if(!is_null($writtenOff) && !is_null($pastDue)){
                if((max($writtenOff, $pastDue) == $writtenOff)){
                    $diff = $writtenOff - $pastDue;
                    $precent = round(($diff / $pastDue)*100, 2);
                    if ($diff != 0) {
                        $name_part = $name_part == null ?strtoupper(" CHARGE OFF WRITTEN OFF AMOUNT MORE THAN PAST DUE  $ {$diff} ({$precent}%)"): $name_part;
                        $need_attention[] = [
                            "text" => "WRITTEN OFF MORE THAN PAST DUE AS OF $ {$diff} ",
                            "case" => 13,
                        ];
                    }

                }else{
                    $diff = $pastDue - $writtenOff;
                    $precent = round(($diff / $pastDue)*100, 2);

                    if ($diff != 0) {
                        $name_part = $name_part == null ? strtoupper(" CHARGE OFF WRITTEN OFF AMOUNT LESS THAN PAST DUE  $ {$diff}  ({$precent}% )"): $name_part;

                        $need_attention[] = [
                            "text" => "PAST DUE MORE THAN WRITTEN OFF AS OF $ {$diff} ",
                            "case" => 14,
                        ];
                    }else{
                        $name_part = $name_part == null ? strtoupper(" CHARGE OFF WRITTEN OFF AMOUNT IS EQUAL TO PAST DUE "): $name_part;
                    }

                }

            }

            if(!is_null($writtenOff) ){
                if(max($balance, $writtenOff) == $balance){
                    $diff = $balance - $pastDue;
                    if ($diff != 0) {


                        $need_attention[] = [
                            "text" => "BALANCE MORE THAN WRITTEN OFF AS OF $ {$diff} ",
                            "case" => 17,
                        ];
                    }
                }else{
                    $diff = $writtenOff - $balance;
                    if ($diff != 0) {
                        $need_attention[] = [
                            "text" => "WRITTEN OFF MORE THAN BALANCE AS OF $ {$diff} ",
                            "case" => 18,
                        ];
                    }
                }
            }

            if(!is_null($pastDue)){
                if(max($balance, $pastDue) == $balance){
                    $diff = $balance - $pastDue;
                    $precent = round(($diff / $pastDue)*100, 2);

                    if ($diff != 0) {

                        $name_part = $name_part == null ? strtoupper(" CHARGE OFF RECENT BALANCE  AMOUNT LESS THAN PAST DUE  ${$diff}  ({$precent}%) "): $name_part;
                        $need_attention[] = [
                            "text" => "BALANCE MORE THAN PAST DUE AS OF $ {$diff} ",
                            "case" => 15,
                        ];
                    }else{
                        $name_part = $name_part == null ? strtoupper(" CHARGE OFF RECENT BALANCE  AMOUNT IS EQUAL TO PAST DUE") : $name_part;
                    }
                }else{
                    $diff = $writtenOff - $balance;
                    $precent = round(($diff / $pastDue)*100, 2);
                    $name_part = $name_part == null ? strtoupper(" CHARGE OFF RECENT BALANCE AMOUNT LESS THAN PAST DUE  ${$diff} ({$precent}%)"): null;

                    if ($diff != 0) {
                        $need_attention[] = [
                            "text" => "PAST DUE MORE THAN BALANCE AS OF $ {$diff} ",
                            "case" => 16,
                        ];
                    }
                }
            }



        }elseif((!is_null($writtenOff) || !is_null($pastDue)) && empty($balance) && !empty($highBalance) ){
            if(($writtenOff != $pastDue) || ($pastDue != $balance) ){
                $need_attention[] = [
                    "text" => "WRITTEN OFF, PAST DUE AND HIGH BALANCE ARE NOT EQUAL",
                    "case" => 19,
                ];
            }

            if(!is_null($writtenOff) && !is_null($pastDue)){
                if(max($writtenOff, $pastDue) == $writtenOff){
                    $diff = $writtenOff - $pastDue;
                    if ($diff != 0) {
                        $need_attention[] = [
                            "text" => "WRITTEN OFF MORE THAN PAST DUE AS OF $ {$diff} ",
                            "case" => 20,
                        ];
                    }
                }else{
                    $diff = $pastDue - $writtenOff;
                    if ($diff != 0) {
                        $need_attention[] = [
                            "text" => "PAST DUE MORE THAN WRITTEN OFF AS OF $ {$diff} ",
                            "case" => 21,
                        ];
                    }
                }
            }

            if( !is_null($pastDue)){
                if(max($highBalance, $pastDue) == $highBalance){
                    $diff = $balance - $pastDue;
                    if ($diff != 0) {
                        $need_attention[] = [
                            "text" => "HIGH BALANCE MORE THAN PAST DUE AS OF $ {$diff} ",
                            "case" => 22,
                        ];
                    }
                }else{
                    $diff = $writtenOff - $highBalance;
                    if ($diff != 0) {
                        $need_attention[] = [
                            "text" => "PAST DUE MORE THAN HIGH BALANCE AS OF $ {$diff} ",
                            "case" => 23,
                        ];
                    }
                }
            }

            if( !is_null($writtenOff)){
                if(max($highBalance, $writtenOff) == $highBalance){
                    $diff = $balance - $pastDue;
                    if ($diff != 0) {
                        $need_attention[] = [
                            "text" => "HIGH BALANCE MORE THAN WRITTEN OFF AS OF $ {$diff} ",
                            "case" => 24,
                        ];
                    }
                }else{
                    $diff = $writtenOff - $highBalance;
                    if ($diff != 0) {
                        $need_attention[] = [
                            "text" => "WRITTEN OFF MORE THAN HIGH BALANCE AS OF $ {$diff} ",
                            "case" => 25,
                        ];
                    }
                }

            }
        }
        if(!empty($creditLimit)){
            if( $writtenOff - $creditLimit > 0.15*($creditLimit)){
                $diff =  $writtenOff - $creditLimit;
                $precent = round(($diff / $creditLimit)*100, 2);
                if ($diff != 0) {
                    $need_attention[] = [
                        "text" => strtoupper("WRITTEN OFF MORE THAN {$this->credit_limit_label} AS OF $ {$diff}   ({$precent}%) "),
                        "case" => 26,
                    ];
                }
            }

            if( $pastDue - $creditLimit > 0.15*($creditLimit)){
                $diff =  $pastDue - $creditLimit;
                $precent = round(($diff / $creditLimit)*100, 2);
                if ($diff != 0) {
                    $need_attention[] = [
                        "text" => strtoupper("PAST DUE MORE THAN {$this->credit_limit_label} AS OF $ {$diff}  ({$precent}%) "),
                        "case" => 27,
                    ];
                }
            }

            if(!is_null($balance) && $balance !="") {
                if (($balance - $creditLimit > 0.15 * ($creditLimit))) {
                    $diff = $balance - $creditLimit;
                    $precent = round(($diff / $creditLimit) * 100, 2);
                    if ($diff != 0) {

                        $name_part = strtoupper(" CHARGE OFF RECENT BALANCE {$precent}% MORE THAN CREDIT LIMIT");
                        $need_attention[] = [
                            "text" => strtoupper("BALANCE DUE MORE THAN {$this->credit_limit_label} AS OF $ {$diff}  ({$precent}%) "),
                            "case" => 28,
                        ];
                    }
                }
            }


            if((is_null($balance) || $balance =="") && ($highBalance- $creditLimit > 0.15*($creditLimit))){
                $precent = ($highBalance / $creditLimit)*100;
                $diff =  $highBalance - $creditLimit;
                if ($diff != 0) {
                    $name_part = strtoupper(" CHARGE OFF HIGH BALANCE {$precent}% MORE THAN CREDIT LIMIT");

                    $need_attention[] = [
                        "text" => strtoupper("HIGH BALANCE DUE MORE THAN $ {$this->credit_limit_label} AS OF $ {$diff}  ({$precent}%) "),
                        "case" => 29,
                    ];
                }
            }
        }


        if($this->account_type() == "AUTO"){

            if(strpos($this->status,'Repossession') !== false &&
                ($this->trem != "NA" || !empty($this->trem )) && !empty($creditLimit) && is_null($writtenOff)){

                $countByType = $this->paymentHistories()->groupBy('status')->select(DB::Raw('COUNT(id) as count'), 'status')
                    ->pluck('count', 'status')->toArray();

                $ok = isset($countByType["OK"])?$countByType["OK"]:0;

               if( ($creditLimit - ($creditLimit / $this->trem ) * $ok) - $writtenOff > 0){
                   $need_attention[] = [
                       "text" => strtoupper("XXXXXXXXXX XXXXXXXX "),
                       "case" => 30,
                   ];
               }
            }
        }
        if($chargeOff){
            $name_part = $name_part == null?"CHARGE OFF":$name_part;
        }
        return [
            'name_part' => $name_part,
            'need_attention' => $need_attention,
        ];

    }

    //account regular charfe off or irregular charge off
    private function getRegular()
    {
        $regular_status = null;
        $need_attention = [];
        $countByType = $this->paymentHistories()->groupBy('status')->select(DB::Raw('COUNT(id) as count'), 'status')
            ->pluck('count', 'status')->toArray();
        $payments = $this->paymentHistories()->orderBy('id', 'DESC')->get();
        $account_statueses = array_keys($countByType);

        $regular_status = ($this->credit_limit == null ||$this->credit_limit == "") ?strtoupper("NO {$this->credit_limit_label} "): $regular_status;


        if($this->account_type() == "CC"){
            $cc_charge_off = ClientReportExAccountsPaymentHistory::NEGATIVE_TYPES["collection_charge_off"];
            foreach ($cc_charge_off as $type) {
                if (in_array(strtoupper($type), $account_statueses)) {
                    $payment_statuses = $payments->pluck("status", 'id')->toArray();
                    $prev = $this->get_prev($payment_statuses, array_search($type, $payment_statuses));
                      // in the case when account type is cc the minimum late are 180 before charge off
                    if ($prev["value"] != 180) {
                        if (in_array(strtoupper($prev['value']), $cc_charge_off) || $prev['value'] == "CLS") {
                            $prev = $this->get_prev($payment_statuses, array_search($type, $payment_statuses));
                            if ($prev["value"] != 180) {
                                $prev = $payments->find($prev["key"]);
                                $date = \DateTime::createFromFormat("Y-M-d", "{$prev['year']}-{$prev['month']}-{$prev['day']}")
                                    ->format("M/Y");

                                $need_attention[] = [
                                    "text" => "{$date} MISSING FULL 180 DAYS LATE BEFORE CHARGE OFF",
                                    "case" => 11,
                                    "id" => $prev["id"],
                                ];

                                $regular_status = strtoupper($regular_status."IRREGULAR {$this->type}");

                            }else{
                                $regular_status = strtoupper($regular_status."REGULAR {$this->type}");
                            }
                            break;
                        }
                        $prev = $payments->find($prev["key"]);
                        $date = \DateTime::createFromFormat("Y-M-d", "{$prev['year']}-{$prev['month']}-{$prev['day']}")
                            ->format("M/Y");
                        $need_attention[] = [
                            "text" => "{$date} MISSING FULL 180 DAYS LATE BEFORE CHARGE OFF",
                            "case" => 11,
                            "id" => $prev["id"],
                        ];

                        $regular_status = strtoupper($regular_status."IRREGULAR {$this->type}");
                        break;
                    }
                    $regular_status = strtoupper($regular_status."REGULAR {$this->type}");
                    break;
                }
            }
        }

        if($this->account_type() == "AUTO"){
            $auto_charge_off = ClientReportExAccountsPaymentHistory::NEGATIVE_TYPES["auto"];
            foreach ($auto_charge_off as $type) {
                if (in_array(strtoupper($type), $account_statueses)) {
                    $name = [
                        "VS" => "VOLUNTARILY SURRENDERED",
                        "R"=> "REPOSSESSION",
                        "I" => "INSURANCE CLAIM"
                    ];
                    $payment_statuses = $payments->pluck("status", 'id')->toArray();
                    $prev = $this->get_prev($payment_statuses, array_search($type, $payment_statuses));

                    $count = array_search($type, $payment_statuses);
                    $a = array_key_first($payment_statuses) - $count;
                    $new_arr = array_slice($payment_statuses, $a, $count +1, true);
                    $late = ClientReportExAccountsPaymentHistory::NEGATIVE_TYPES['lates'];
                    if(!empty(array_intersect($new_arr, $late))){
                        $regular_status = strtoupper($regular_status."IRREGULAR {$this->type} PAST DUE AFTER {$name[$type]}");

                    }

                    // in the case when account type is auto the minimum late are 60 before charge off
                    if ($prev["value"] != 60) {
                        $prev = $payments->find($prev["key"]);
                        $date = \DateTime::createFromFormat("Y-M-d", "{$prev['year']}-{$prev['month']}-{$prev['day']}")
                            ->format("M/Y");
                        $need_attention[] = [
                            "text" => "{$date} MISSING FULL 60 DAYS LATE BEFORE {$name[$type]}",
                            "case" => 11,
                            "id" => $prev["id"],
                        ];
                        if($regular_status == null) {
                            $regular_status = strtoupper($regular_status . "IRREGULAR {$this->type} {$name[$type]}");
                        }
                        break;
                    }
                    if($regular_status == null){
                        $regular_status = strtoupper($regular_status."REGULAR {$this->type} {$name[$type]}");;
                    }
                    break;

                }
            }

            if($regular_status == null || $regular_status == "NO CREDIT LIMIT"){
                $cc_charge_off = ClientReportExAccountsPaymentHistory::NEGATIVE_TYPES["collection_charge_off"];
                foreach ($cc_charge_off as $type) {
                    if (in_array(strtoupper($type), $account_statueses)) {
                        $payment_statuses = $payments->pluck("status", 'id')->toArray();
                        $prev = $this->get_prev($payment_statuses, array_search($type, $payment_statuses));
                        // in the case when account type is cc the minimum late are 180 before charge off
                        if ($prev["value"] != 60) {
                            if (in_array(strtoupper($prev['value']), $cc_charge_off)) {
                                $prev = $this->get_prev($payment_statuses, array_search($type, $payment_statuses));
                                if ($prev["value"] != 60) {
                                    $prev = $payments->find($prev["key"]);
                                    $date = \DateTime::createFromFormat("Y-M-d", "{$prev['year']}-{$prev['month']}-{$prev['day']}")
                                        ->format("M/Y");

                                    $need_attention[] = [
                                        "text" => "{$date} MISSING FULL 60 DAYS LATE BEFORE CHARGE OFF",
                                        "case" => 11,
                                        "id" => $prev["id"],
                                    ];

                                    $regular_status = strtoupper($regular_status."IRREGULAR {$this->type}");;

                                }else{
                                    $regular_status = strtoupper($regular_status."REGULAR {$this->type}");;
                                }
                                break;
                            }
                            $prev = $payments->find($prev["key"]);
                            $date = \DateTime::createFromFormat("Y-M-d", "{$prev['year']}-{$prev['month']}-{$prev['day']}")
                                ->format("M/Y");
                            $need_attention[] = [
                                "text" => "{$date} MISSING FULL 60 DAYS LATE BEFORE CHARGE OFF",
                                "case" => 11,
                                "id" => $prev["id"],
                            ];
                            $regular_status = strtoupper($regular_status."IRREGULAR {$this->type}");;
                            break;
                        }
                        $regular_status = strtoupper($regular_status."IRREGULAR {$this->type}");;
                        break;
                    }
                }
            }

        }

        if($this->account_type() == "PERSONAL LOAN"){
            $charge_off = ClientReportExAccountsPaymentHistory::NEGATIVE_TYPES["collection_charge_off"];
            foreach ($charge_off as $type) {
                if (in_array(strtoupper($type), $account_statueses)) {
                    $payment_statuses = $payments->pluck("status", 'id')->toArray();
                    $prev = $this->get_prev($payment_statuses, array_search($type, $payment_statuses));
//                      // in the case when account type is  personal loan the minimum late are 120 before charge off
                    if ($prev["value"] != 120) {
                        if (in_array(strtoupper($prev['value']), $charge_off)) {
                            $prev = $this->get_prev($payment_statuses, array_search($type, $payment_statuses));

                            if ($prev["value"] != 120) {
                                $regular_status = $regular_status. strtoupper("Irregular {$this->type}");

                                $prev = $payments->find($prev["key"]);
                                $date = \DateTime::createFromFormat("Y-M-d", "{$prev['year']}-{$prev['month']}-{$prev['day']}")
                                    ->format("M/Y");
                                $need_attention[] = [
                                    "text" => "{$date} MISSING FULL 120 DAYS LATE BEFORE CHARGE OFF",
                                    "case" => 11,
                                    "id" => $prev["id"],
                                ];
                            } else {
                                $regular_status = $regular_status. strtoupper("regular {$this->type}");

                            }
                            break;
                        }
                        $prev = $payments->find($prev["key"]);
                        $date = \DateTime::createFromFormat("Y-M-d", "{$prev['year']}-{$prev['month']}-{$prev['day']}")
                            ->format("M/Y");
                        $regular_status = $regular_status. strtoupper("Irregular {$this->type}");
                        $need_attention[] = [
                            "text" => "{$date} MISSING FULL 120 DAYS LATE BEFORE CHARGE OFF",
                            "case" => 11,
                            "id" => $prev["id"],
                        ];
                        break;
                    }
                    $regular_status = $regular_status. strtoupper("regular {$this->type}");
                    break;
                }
            }
        }

        if($this->account_type() == "STUDENT LOAN"){
            $cc_charge_off = ClientReportExAccountsPaymentHistory::NEGATIVE_TYPES["collection_charge_off"];
            foreach ($cc_charge_off as $type) {

                if (in_array(strtoupper($type), $account_statueses)) {
                    $payment_statuses = $payments->pluck("status", 'id')->toArray();
                    $prev = $this->get_prev($payment_statuses, array_search($type, $payment_statuses));
//                      // in the case when account type is student loan the minimum late are 180 before charge off

                    if ($prev["value"] != 180) {
                        if (in_array(strtoupper($prev['value']), $cc_charge_off)) {
                            $prev = $this->get_prev($payment_statuses, array_search($type, $payment_statuses));

                            if ($prev["value"] != 180) {
                                $regular_status = $regular_status. strtoupper("Irregular {$this->type}");
                                $prev = $payments->find($prev["key"]);
                                $date = \DateTime::createFromFormat("Y-M-d", "{$prev['year']}-{$prev['month']}-{$prev['day']}")
                                    ->format("M/Y");
                                $need_attention[] = [
                                    "text" => "{$date} MISSING FULL 180 DAYS LATE BEFORE CHARGE OFF",
                                    "case" => 11,
                                    "id" => $prev["id"],
                                ];
                            } else {
                                $regular_status = $regular_status. strtoupper("Regular {$this->type}");
                            }

                            break;
                        }
                        $prev = $payments->find($prev["key"]);
                        $date = \DateTime::createFromFormat("Y-M-d", "{$prev['year']}-{$prev['month']}-{$prev['day']}")
                            ->format("M/Y");
                        $need_attention[] = [
                            "text" => "{$date} MISSING FULL 180 DAYS LATE BEFORE CHARGE OFF",
                            "case" => 11,
                            "id" => $prev["id"],
                        ];
                        $regular_status = $regular_status. strtoupper("Irregular {$this->type}");

                    }
                    $regular_status = $regular_status. strtoupper("regular {$this->type}");

                    break;
                }
            }

            if (in_array(strtoupper(ClientReportExAccountsPaymentHistory::NEGATIVE_TYPES["student"]), $account_statueses)) {
                $payment_statuses = $payments->pluck("status", 'id')->toArray();
                $prev = $this->get_prev($payment_statuses, array_search($type, $payment_statuses));
//                      // in the case when account type is cc the minimum lates are 180 before charge off
                if ($prev["value"] != 180) {
                    $regular_status = $regular_status. strtoupper("IRREGULAR {$this->type} CLAIM FILED WITH GOVERNMENT");

                }
                $regular_status = $regular_status. strtoupper("Regular {$this->responsibility} {$this->type} CLAIM FILED WITH GOVERNMENT");

            }
        }

        return [
            "regular_status" => $regular_status,
            "need_attention" => $need_attention,
        ];

    }
}
