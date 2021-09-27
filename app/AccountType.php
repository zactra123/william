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

    public function accountKeys()
    {
        return $this->belongsToMany('App\AccountTypeKeys', 'account_type_key_word', 'account_type_id','account_type_key_id');
    }
}
