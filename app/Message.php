<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';

    protected $fillable = [
        'user_id',
        'name',
        'phone_number',
        'question',
        'answer',
        'completed',
        'call_date',
    ];
}
