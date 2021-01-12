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
        3 => "CREDIT BUREAU",
        4 => "COLLECTION",
        5 => "MED SERVICE PROVIDER",
        6 => "MED FINANCE PROVIDER",
        7 => "UTILITY PROVIDER",
        8 => "CHECK CASHING",
        9 => "PAYDAY LOAN",
        10 => "CHECK GUARANTEE PROVIDER",
        11 => "CELLULAR SERVICE PROVIDER",
        12 => "INTERNET/CABLE/HOME PHONE PROVIDER",
        13 => "HOME SECURITY PROVIDER",
        14 => "JEWELERY STORE",
        15 => "RESIDENTIAL RENT/LEASE PROVIDER",
        16 => "(HOA) HOMEOWNER’S ASSOCIATION",
        17 => "AUTO FINANCE COMPANY",
        18 => "CREDIT CARD ISSUER",
        19 => "PERSONAL LOAN LENDER",
        20 => "STORE CHARGE CARD",
        21 => "MCA LENDER",
        22 => "AUTO INSURANCE COMPANY",
        23 => "SOLOR SYSTEM PROVIDER",
        24 => "HOUSEHOLD ITEM/APPLIANCE",
        25 => "TRUCK LOAD",
        26 => "TRUCK TRAILER LENDER",
        27 => "RV FINANCE",
        28 => "EDUCATIONAL LENDER",
        29 => "MORTGAGE LENDER",
        30 => "HELOC LENDER",
        31 => "TIMESHARE/RESORT COMPANY",
        32 => "IMMIGRANT LOAN LENDER",
        33 => "CC MERCHANT SERVICES",
        34 => "FEDERAL BK COURT",
        35 => "CHILD/FAMILY SUPPORT",
        36 => "SOCIAL SECURITY ADMIN.",
        37 => "CASINO/GAMBLING",
        38 => "FUNERAL GOODS/SERVICES",
        39 => "PUBLIC STORAGE COMPANY",
        40 => "SBA LENDER",
        41 => "TRAFFIC COURT/TICKET",
        42 => "PEST CONTROL COMPANY",
        43 => "MOTORCYCLE FINANCE COMPANY",
        44 => "LAW FIRM"
    ];

    protected static function boot()
    {
        parent::boot();
        static::saving(function ($model) {
            $model->name = is_null($model->name) ? null : strtoupper($model->name);
        });
    }

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
