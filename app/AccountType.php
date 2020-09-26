<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountType extends Model
{


    public function bankAccounts()
    {
        return $this->hasMany('App\BankAccount');
    }
}
