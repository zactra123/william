<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionNote extends Model
{
    protected $table = 'question_notes';

    protected $fillable = [
        'user_id',
        'message_id',
        'notes'

    ];

}
