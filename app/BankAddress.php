<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankAddress extends Model
{
    protected $table = 'bank_addresses';

    protected $fillable = [
        'bank_logo_id',
        'account_type_id',
        'type',
        'street',
        'city',
        'state',
        'zip',
        'phone_number',
        'fax_number',
        'name',
        'email'
    ];

    const TYPES = [
        'dispute_address'=>'DISPUTE ADDRESS',
        'additional_address'=>'ADDITIONAL ADDRESS',
        'fraud_address' => 'FRAUD DISPUTE ADDRESS',
        'qwr_address' => 'QWR ADDRESS',
        'executive_address'=>'EXECUTIVE CONTACT',
        'registered_agent'=>'REGISTERED AGENT',
    ];

    const STATES = [
        "AL"=> "AL",
        "AK"=> "AK",
        "AS"=> "AS",
        "AZ"=> "AZ",
        "AR"=> "AR",
        "CA"=> "CA",
        "CO"=> "CO",
        "CT"=> "CT",
        "DE"=> "DE",
        "DC"=> "DC",
        "FM"=> "FM",
        "FL"=> "FL",
        "GA"=> "GA",
        "GU"=> "GU",
        "HI"=> "HI",
        "ID"=> "ID",
        "IL"=> "IL",
        "IN"=> "IN",
        "IA"=> "IA",
        "KS"=> "KS",
        "KY"=> "KY",
        "LA"=> "LA",
        "ME"=> "ME",
        "MH"=> "MH",
        "MD"=> "MD",
        "MA"=> "MA",
        "MI"=> "MI",
        "MN"=> "MN",
        "MS"=> "MS",
        "MO"=> "MO",
        "MT"=> "MT",
        "NE"=> "NE",
        "NV"=> "NV",
        "NH"=> "NH",
        "NJ"=> "NJ",
        "NM"=> "NM",
        "NY"=> "NY",
        "NC"=> "NC",
        "ND"=> "ND",
        "MP"=> "MP",
        "OH"=> "OH",
        "OK"=> "OK",
        "OR"=> "OR",
        "PW"=> "PW",
        "PA"=> "PA",
        "PR"=> "PR",
        "RI"=> "RI",
        "SC"=> "SC",
        "SD"=> "SD",
        "TN"=> "TN",
        "TX"=> "TX",
        "UT"=> "UT",
        "VT"=> "VT",
        "VI"=> "VI",
        "VA"=> "VA",
        "WA"=> "WA",
        "WV"=> "WV",
        "WI"=> "WI",
        "WY"=> "WY",
    ];

    protected static function boot()
    {
        parent::boot();
        static::saving(function ($model) {
            $model->name = is_null($model->name) ? null : strtoupper($model->name);
            $model->street = is_null($model->street) ? null : strtoupper($model->street);
            $model->city = is_null($model->city) ? null : strtoupper($model->city);
            $model->state = is_null($model->state) ? null : strtoupper($model->state);
            $model->email = is_null($model->email) ? null : strtoupper($model->email);
        });
    }

    public function bank()
    {
        return $this->belongsTo('App\BankLogo');
    }

    public function accountType()
    {
        return $this->belongsTo('App\AccountType');
    }

}
