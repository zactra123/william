<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class BankLogo extends Model
{
    protected $table = 'bank_logos';

    protected $fillable =[
        'parent_id',
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
        8 => "CHECK CASHING/PAYDAY LOAN",
//        9 => "PAYDAY LOAN",
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
//        34 => "FEDERAL BK COURT",
        35 => "CHILD/FAMILY SUPPORT",
        36 => "SOCIAL SECURITY ADMIN.",
        37 => "CASINO/GAMBLING",
        38 => "FUNERAL GOODS/SERVICES",
        39 => "PUBLIC STORAGE COMPANY",
        40 => "SBA LENDER",
        41 => "TRAFFIC COURT/TICKET",
        42 => "PEST CONTROL COMPANY",
        43 => "MOTORCYCLE FINANCE COMPANY",
        44 => "LAW FIRM",
        45 => "CHECK VERIFICATION",
        46 => "TOW TRUCK COMPANY",
        47 => "TRUSTEE",
        48=>  "SAVINGS ASSOCIATIONS",
        49 => "MORTGAGE SERVICER",
        50 => "NATIONAL BANK",
        51 => "STATE CHARTERED BANK",
        52 => "FEDERAL SAVINGS ASSOCIATION",
        53 => "FOREIGN BANK",
        54 => "STATE SAVINGS ASSOCIATION",
        55 => "FEDERAL CREDIT UNION",
        56 => "RENT PAYMENT PLATFORM",
        57 => "LIFE INSURANCE",

    ];

    const SUB_TYPES = [
        1 => [
          1 => "DEPOSIT ACCOUNT",
          2 => "CARD ISSUER"
        ],
        2 =>[
                1 => "DEPOSIT ACCOUNTS",
                2 => "MORTGAGE",
                3 => "AUTO LOAN",
                4 => "RV LOAN",
                5 => "PERSONAL LOAN",
                6 => "CREDIT CARD",
        ],
        4 =>[
                1 => "3RD PARTY CA",
                2 => "ASSET/DEBT BUYER",
        ],
        7 =>[
                1 => "WATER/POWER",
                2 => "GAZ",
        ],
        12 => [
                1 => "CABLE/TV",
                2 => "INTERNET",
                3 => "HOME PHONE",
        ],
        13 => [
                1 => "EQUIPMENT",
                2 => "MONITORING",
        ],

        17 => [
                1 => "REGULAR DISPUTE",
                2 => "LOAN",
                3 => "SUB-PRIME",
                5 => "TITLE LOAN",
                6 => "TRACK FINANCE"
        ],
        20 => [
                1 => "DEPARTMENT STORE",
                2 => "JEWELRY STORE",
                3 => "FURNITURE STORE",
                4 => "BUILDING MATERIALS",
                5 => "MED FINANCE",
                6 => "MUSIC STORE FINANCE",
                7 => "GAS/FUEL",
                8 => "TIRE SHOP",
        ],
        29 => [
                1 => "CONVENTIONAL",
                2 => "GOVERNMENT INSURED",
                3 => "JUMBO",
                4 => "ADJSUTABLE-RATE",
                5 => "FIXED-RATE",
                6 => "HELOC",
                7 => "PRIVATE MONEY",
        ],
        35 => [
                1 => "CHILD SUPPORT",
                2 => "FAMILY SUPPORT",
        ],
        44 =>[
                1 => "3RD PARTY CA",
        ],
        55 => [
                1 => "DEPOSIT ACCOUNTS",
                2 => "MORTGAGE",
                3 => "AUTO LOAN",
                4 => "RV LOAN",
                5 => "PERSONAL LOAN",
                6 => "CREDIT CARD",
        ]
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

    public function parent()
    {
        return $this->belongsTo('App\BankLogo', 'parent_id');
    }

}
