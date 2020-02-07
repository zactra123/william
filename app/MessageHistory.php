<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MessageHistory extends Model
{
    protected $table = 'message_histories';

    protected $fillable = [
        'message_id',
        'user_id',
        'name',
        'phone_number',
        'email',
        'title',
        'description',
        'completed',
        'call_date',

    ];
}
