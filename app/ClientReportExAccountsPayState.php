<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientReportExAccountsPayState extends Model
{
    protected  $table = 'client_report_ex_accounts_pay_states';

    protected $fillable = [
        "client_report_ex_account_id",
        "name"
    ];

    public function clientReportExAccount()
    {
        return $this->belongsTo('App\ClientReportExAccount');
    }
}
