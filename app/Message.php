<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use SoftDeletes;

    protected $table = 'messages';

    protected $fillable = [
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
