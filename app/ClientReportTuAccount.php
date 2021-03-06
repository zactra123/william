<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientReportTuAccount extends Model
{
    private $ACCOUNT_TYPES = [
        "CC" => ['credit card','business credit card', 'credit card/flexible spending credit card',
            'secured credit card', 'charge account'],
        "AUTO" => ['auto','auto lease','automobile','recreational merchandise', 'installment sales contract'],
        "PERSONAL LOAN" => ['secured', 'unsecured', 'line of credit'],
        "MORTGAGE" => ['mortgage','conventional real estate mtg ','conventional real estate mortgage',
            'home equity loan'],
        "CA"=>['debt buyer', 'collection','collection agency/attorney'],
        "STUDENT LOAN" =>['student','student loan'],
        "UTILITY " =>['utility', 'utility company'],
        "CELL PHONE " =>['telecommunications/cellular'],
        "PUBLIC RECORD" => ['child support', 'family support'],
    ];


    protected $table = 'client_report_tu_accounts';

    protected $fillable = [
        'client_report_id',
        'type',
        'sub_type',
        'suppression_flag',
        'adverse_flag',
        'suppression_indicator',
        'account_name',
        'm_account_name',
        'account_handle',
        'address',
        'street',
        'city',
        'state',
        'zip',
        'phone',
        'account_number',
        'payment_frequency',
        'payment_schedule_month_count',
        'scheduled_monthly_payment',
        'date_opened',
        'date_placed_for_collection',
        'responsibility',
        'account_type',
        'account_type_description',
        'loan_type',
        'balance',
        'date_effective_label',
        'date_effective',
        'date_updated',
        'last_payment_amount',
        'high_balance',
        'original_amount',
        'original_charge_off',
        'original_creditor',
        'credit_limit',
        'past_due',
        'pay_status',
        'terms',
        'date_closed',
        'date_paid',
        'date_paid_out',
        'max_delinquency',
        'hist_high_credit_stmt',
        'hist_credit_limit_stmt',
        'special_payment',
        'mortgage_info',
        'account_sale_info',
        'estimated_deletion_date',
        'last_payment_date',
        'account_history_start_date',
        'hist_balance_list',
        'hist_payment_due_list',
        'hist_payment_amt_list',
        'hist_past_due_list',
        'hist_credit_limit_list',
        'hist_high_credit_list',
        'hist_remark_list',
        'remark',
        'rating',
        'date_account_status',
        'current_balance',
        'date_reported',
        'account_condition',
        'late_30_count',
        'late_60_count',
        'late_90_count',
        'worst_pay_status',
        'm_pay_status',
        'oldest_year',
        'subscriber_code',
        'secondary_agency',
    ];

    protected $casts = [
        'secondary_agency' => 'array'
    ];

    public function clientReport()
    {
        return $this->belongsTo('App\ClientReport');
    }

    public function accountPaymentHistories()
    {
        return $this->hasMany('App\ClientReportTuAccountsPaymentHistory');
    }

    public function showDetails()
    {
        $berau = ClientReport::REPORT_TYPES[$this->clientReport->type];
        $name =  $this->account_name.' #'.$this->account_number;
        return "$berau : $name";
    }

    public function dispute()
    {
        return $this->belongsTo("App\Disputable", 'id','disputable_id')->where('disputables.disputable_type', 'App\\ClientReportTuAccount');
    }

    public function account_type()
    {
        $type = strtolower($this->loan_type);

        if($this->sub_type == 'collection'){
            return "CA";
        }

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
