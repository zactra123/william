<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class BankLogo extends Model
{
    protected $table = 'bank_logos';

    protected $fillable =[
        'name',
        'type',
        'path',
        'additional_information'
    ];
    protected $casts = [
        'additional_information' => 'array'
    ];

    const TYPES = [
        1 => "BANK",
        2 => "CREDIT UNION",
        3 => "COLLECTION",
        4 => "CRA"
    ];

    public function checkUrlAttribute()
    {
        return Storage::disk('s3')->has($this->path);
    }

    public function getUrlAttribute()
    {
        return Storage::disk('s3')->url($this->path);
    }


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

    public function bankAddresses()
    {
        return $this->hasMany('App\BankAddress');
    }

    public function bankTypes()
    {
        return $this->belongsToMany('App\AccountType', 'bank_addresses','bank_logo_id', 'account_type_id');
    }

}
