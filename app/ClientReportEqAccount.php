<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientReportEqAccount extends Model
{
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

    public function clientReport()
    {
        return $this->belongsTo('App\ClientReport');
    }

    public function paymentHistories()
    {
        return $this->hasMany('App\ClientReportEqAccountsPaymentHistory');
    }
}
