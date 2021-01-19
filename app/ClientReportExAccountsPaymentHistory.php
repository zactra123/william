<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientReportExAccountsPaymentHistory extends Model
{
    protected  $table = 'client_report_ex_accounts_payment_histories';

    const NEGATIVE_TYPES = [
        "lates" => [
            30,//Account 30 days past due
            60,//Account 60 days past due
            90,//Account 90 days past due
            120,//Account 120 days past due
            150,//Account 150 days past due
            180,//Account 180 days past due
        ],
        "mortgage" => [
            'CRD',//Creditor received deed => MORTGAGES
            'FS',// Foreclosure proceedings started => MORTGAGES
            'F',//Foreclosed => MORTGAGES
        ],
        "auto" => [
            'VS',//Voluntarily surrendered => AUTO
            'R',//Repossession => AUTO
            'IC',// Insurance claim => AUTO
        ],
        "student" => [
            'G',// Claim filed with government =>STUDENT
        ],
        "collection_charge_off" => [
            'CO',//Charge off
            'C',//Collection
        ],
        "other"=> [
            'PBC',//Paid by creditor => ?
            'D',//Defaulted on contract
        ]

    ];

    protected $fillable = [
        "client_report_ex_account_id",
        "month",
        "day",
        "year",
        "status",

    ];

    public function clientReportExAccount()
    {
        return $this->belongsTo('App\ClientReportExAccount');
    }
}
