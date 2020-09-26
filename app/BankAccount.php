<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    protected $table = 'bank_accounts';

    protected $with = [
        'accountAddresses'
    ];

    protected $fillable = ['bank_logo_id', 'account_type_id'];

    public function bank()
    {
        return $this->belongsTo('App\BankLogo');
    }

    public function accountType()
    {
        return $this->belongsTo('App\AccountType');
    }


    public function accountAddresses()
    {
        return $this->hasMany('App\BankAddress');
    }

}
