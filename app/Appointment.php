<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = 'appointments';

    protected $fillable =[

        'user_id',
        'name',
        'start_date',
        'description',
        'phone_number'
    ];
}
