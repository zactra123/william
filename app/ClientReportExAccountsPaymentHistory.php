<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientReportExAccountsPaymentHistory extends Model
{
    protected  $table = 'client_report_ex_accounts_payment_histories';

    protected $fillable = [
        "client_report_ex_account_id",
        "month",
        "day",
        "year",
        "status",

    ];

    public function clientReportExAccount()
    {
        return $this->belongsTo('App\ClientReportExAccount');
    }
}
