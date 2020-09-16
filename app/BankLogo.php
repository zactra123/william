<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankLogo extends Model
{
    protected $table = 'bank_logos';

    protected $fillable =[
        'name',
        'path',
    ];

    public function bankAccounts()
    {
        return $this->hasMany('App\BankAccount');
    }

    public function equalBanks()
    {
        return $this->hasMany('App\EqualBank');
    }

    public function bankPhoneNumber()
    {
        return $this->hasMany('App\BankPhoneNumber');
    }

}
