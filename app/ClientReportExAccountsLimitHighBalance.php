<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientReportExAccountsLimitHighBalance extends Model
{
    protected $fillable = [
        'experian_account_id',
        'name'
    ];

    public function exAccount()
    {
        return $this->belongsTo('App/ClientReportExAccount');
    }
}


