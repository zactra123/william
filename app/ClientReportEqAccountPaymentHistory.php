<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientReportEqAccountPaymentHistory extends Model
{
    protected  $table = 'client_report_eq_account_payment_histories';

    protected $fillable = [
        "client_report_eq_account_id",
        "month",
        "year",
        "value",

    ];

    public function clientReportTuAccount()
    {
        return $this->belongsTo('App/ClientReportEqAccount');
    }
}
