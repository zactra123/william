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
}
