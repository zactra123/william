<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountType extends Model
{
    protected $table = 'account_types';
    protected $fillable = [
        'type',
        'name'
    ];

    public function bankAccounts()
    {
        return $this->hasMany('App\BankAccount');
    }
    public function accountTypeKeyWord()
    {
        return $this->hasMany('App\AccountTypeKeyWord');
    }
}
