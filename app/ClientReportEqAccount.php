<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientReportEqAccount extends Model
{
    private $ACCOUNT_TYPES = [
        "CC" => ['business credit Card', 'credit card', 'flexible spending credit Card', 'charge account'],
        "AUTO" => ['auto', 'auto lease'],
        "PERSONAL LOAN" => ['unsecured', 'unsecured loan', 'line of credit', 'note loan'],
        "MORTGAGE" => ['mortgage','conventional re mortgage', 'home equity line of credit'],
        "CA"=>['collection account', 'factoring company account', 'debt buyer'],
        "STUDENT LOAN" =>['education','education Loan'],
        "UTILITY " =>['telecommunication/cellular','utility company'],
        "PUBLIC RECORD" => ['child support', 'family support'],
    ];

    protected $table = 'client_report_eq_accounts';
    protected $fillable = [
        'client_report_id',
        'type',
        'account_id',
        'account_number',
        'account_standing',
        'account_status',
        'account_title',
        'account_type',
        'actual_payment_amount',
        'amount_past_due',
        'balance',
        'balance_remain_percent',
        'category_type',
        'current_balance',
        'date_closed',
        'date_last_payment',
        'date_opened',
        'date_reported',
        'high_balance',
        'industry_code',
        'street',
        'city',
        'state',
        'zip',
        'name',
        'phone',
        'is_open',
        'last_payment',
        'late_30_count',
        'late_60_count',
        'late_90_count',
        'limit_amount',
        'monthly_payment',
        'original_creditor',
        'new_account_label',
        'current_payment_status',
        'start_date',
        'worst_payment_status',
        'perm_por_item_id',
        'por_item_id',
        'portfolio_type',
        'remarks',
        'report_id',
        'responsibility',
        'tradeline_id',
        'utilization ',
        'worst_pay_status ',
        'has_limit ',
        'limit ',
        'utilization_percentage ',
        'term_month',
    ];
    protected $with = ["dispute"];

    public function clientReport()
    {
        return $this->belongsTo('App\ClientReport');
    }

    public function paymentHistories()
    {
        return $this->hasMany('App\ClientReportEqAccountPaymentHistory');
    }

    public function showDetails()
    {
        $berau = ClientReport::REPORT_TYPES[$this->clientReport->type];
        $name =  $this->name;

        return "$berau : $name";
    }

    public function dispute()
    {
        return $this->belongsTo("App\Disputable", 'id','disputable_id')->where('disputables.disputable_type', 'App\\ClientReportEqAccount');
    }

    public function account_type()
    {
        $type = strtolower($this->account_type);

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
