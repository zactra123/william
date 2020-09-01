<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankAddress extends Model
{
    protected $table = 'bank_addresses';

    protected $fillable =[

        'bank_logo_id',
        'type',
        'street',
        'city',
        'state',
        'zip',
    ];

    public function user()
    {
        return $this->belongsTo('App\BankLogo');
    }

}
