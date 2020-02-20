<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $table = 'chat';

    protected $fillable =[
        "message",
        "recipient_type",
        "recipient_id",
        "user_id",
        "type"
    ];



}