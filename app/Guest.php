<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $table = 'guest';

    protected $fillable = [
        'user_id',
        'full_name',
        'email',
        'phone'
    ];

    protected $with = ["user"];


    public function user()
    {
        return $this->belongsTo('App\User','user_id', 'id');

    }


}
