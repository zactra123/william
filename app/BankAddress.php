<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankAddress extends Model
{
    protected $table = 'bank_addresses';

    protected $fillable = [
        'bank_logo_id',
        'type',
        'street',
        'city',
        'state',
        'zip',
        'phone_number',
        'fax_number',
        'name'
    ];

    const TYPES = [
        'dispute_address'=>'DISPUTE ADDRESS',
        'executive_address'=>'EXECUTIVE ADDRESS',
        'governing_authority'=>'GOVERNING AUTHORITY',
        'legal_department_address'=>'LEGAL DEPARTMENT ADDRESS',
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

    public function bank()
    {
        return $this->belongsTo('App\BankLogo');
    }

}
