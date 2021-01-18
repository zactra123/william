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
        "UTILITY " =>['cell phone','utility'],
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
     * return $late_status(string), $need_attention(array)
     */
    public function lates()
    {
        $late_status = '';
        $need_attention = [];


        $countByType = $this->paymentHistories()->groupBy('status')->select(DB::Raw('COUNT(id) as count'), 'status')
            ->pluck('count', 'status')->toArray();
        $payments = $this->paymentHistories()->orderBy('id', 'DESC')->get()->toArray();
        $account_statueses = array_keys($countByType);

        $negative_statuses = ClientReportExAccountsPaymentHistory::NEGATIVE_TYPES;

        // getting late status for account dispute reason
        foreach (array_reverse($negative_statuses) as $status) {
            if (in_array($status, $account_statueses)) {
                if ($status != 30) {
                    $late_status = "{$status}-DAYS LATE";
                    break;
                } else {
                    $late_status =  count($account_statueses['30']) > 1 ? "SIMPLE 30-DAYS LATE" : count($account_statueses['30']) . "x 30-DAYS LATE";
                }
            }
        }

        foreach($payments as $key=>&$payment) {
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
                            "case" => 2,
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
                            "case" => 2,
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
                            "case" => 3,
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
                            "case" => 2,
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
                            "case" => 4,
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
                            "case" => 2,
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
                            "case" => 5,
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
                            "case" => 2,
                            "id" => $payments[$key-1]["id"],
                        ];
                    }
                    break;
            }
        }


        return ["status" => $late_status, "need_attention" => $need_attention];
    }
}
