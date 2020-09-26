<?php


namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Guest;

class Chat extends Model
{
    protected $table = 'chat';

    protected $fillable =[
        "message",
        "recipient_type",
        "recipient_id",
        "user_id",
        "type",
        "private"
    ];

    protected $with = ["admin", "recipient"];

    public function guest()
    {
        return $this->belongsTo('App\Guest','recipient_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo('App\User','recipient_id', 'id');

    }

    public function recipient()
    {
        return $this->morphTo();
    }

    public function admin()
    {
        return $this->belongsTo('App\User','user_id', 'id');

    }

}
