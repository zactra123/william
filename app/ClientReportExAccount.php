<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientReportExAccount extends Model
{
    private $ACCOUNT_TYPES = [
        "CC" => ['credit card', 'charge card', 'business credit'],
        "AUTO" => ['auto lease', 'auto loan'],
        "PERSONAL LOAN" => ['unsecured', 'secured loan', 'line of credit',  'note loan', 'sales contract'],
        "MORTGAGE" => ['mortgage', 'fha mortgage', 'home equity', 'rental'],
        "CA"=>['collection', 'debt buyer'],
        "STUDENT LOAN" =>['education','education loan'],
        "UTILITY " =>['cell phone','utility'],
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
        foreach($this->ACCOUNT_TYPES as $key => $accounts){
            foreach($accounts as $account){
                if(strpos($type, $account) !== false){
                    return $key;
                }
            }

        }
        return "UNKNOWN";
    }
}
