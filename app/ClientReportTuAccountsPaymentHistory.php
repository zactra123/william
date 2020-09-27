<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientReportTuAccountsPaymentHistory extends Model
{
    protected  $table = 'client_report_tu_accounts_payment_histories';

    protected $fillable = [
        "client_report_tu_account_id",
        "month",
        "year",
        "value",

    ];

    public function clientReportTuAccount()
    {
        return $this->belongsTo('App/ClientReportTuAccount');
    }
}
