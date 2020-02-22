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

    public function guest()
    {
        return $this->belongsTo('App\Guest','recipient_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo('App\User','recipient_id', 'id');

    }



}