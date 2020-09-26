<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankPhoneNumber extends Model
{
    protected $table = 'bank_phone_numbers';

    protected $fillable =[

        'bank_logo_id',
        'type',
        'number',

    ];

    public function user()
    {
        return $this->belongsTo('App\BankLogo');
    }

}
