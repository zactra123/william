<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientReportExAccountsLimitHighBalance extends Model
{
    protected  $table = 'client_report_ex_accounts_limit_high_balances';

    protected $fillable = [
        'experian_account_id',
        'name'
    ];

    public function clientReportExAccount()
    {
        return $this->belongsTo('App\ClientReportExAccount');
    }
}


