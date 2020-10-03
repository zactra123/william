<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankLogo extends Model
{
    protected $table = 'bank_logos';

    protected $fillable =[
        'name',
        'type',
        'path',
    ];

    const TYPES = [
        "credit_card_banks" => "CREDIT CARD BANKS",
        "change_card_banks" => "CHARGE CARD BANKS",
        "jewelery_companies" => "JEWELERY COMPANIES",
        "merchant_processors" => "MERCHANT PROCESSOSRS",
        "finance_companies" => "FINANCE COMPANIES",
        "student_loans" => "STUDENT LOANS",
        "mortgagees" => "MORTGAGEES",
        "helocs" => "HELOCS",
        "auto_finances" => "AUTO FINANCES",
        "credit_bureaus" => "CREDIT BUREAUS",
        "collection_agencies" => "COLLECTION AGENCIES",
        "med_service_providers" => "MED SERVICE PROVIDERS",
        "child_support" => "CHILD SUPPORT",
        "federal_courts" => "FEDERAL COURTS",
        "state_courts" => "STATE COURTS",
        "governing_authorities" => "GOVERNING AUTHORITIES",
        "law_firms" => "LAW FIRMS",
        "utility_companies" => "UTILITY COMPANIES",
        "residential_companies" => "RESIDENTIAL COMPANIES",
        "cell_phone_companies" => "CELL PHONE COMPANIES",
        "home_security_companies" => "HOME SECURITY COMPANIES"
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

    public function bankAddresses()
    {
        return $this->hasMany('App\BankAddress');
    }

    public function bankTypes()
    {
        return $this->belongsToMany('App\AccountType', 'bank_addresses','bank_logo_id', 'account_type_id');
    }

}
