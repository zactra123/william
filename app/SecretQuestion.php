<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SecretQuestion extends Model
{
    protected $table = 'secret_questions';

    protected $fillable = [
        'user_id',
        'question',

    ];
}
