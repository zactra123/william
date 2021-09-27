<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientReportExAccountsBalanceHistory extends Model
{
    protected  $table = 'client_report_ex_accounts_balance_histories';

    protected $fillable = [
        "client_report_ex_account_id",
        "date",
        "amount",
        "date_pr",
        "amount_sch",
        "amount_act"

    ];

    public function clientReportExAccount()
    {
        return $this->belongsTo('App\ClientReportExAccount');
    }
}
