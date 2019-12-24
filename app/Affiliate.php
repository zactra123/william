<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Affiliate extends Model
{
    //table of client attachment
    protected $table = 'affiliates';

    protected $fillable = [
        'user_id',
        'affiliate_id',

    ];


    public function user()
    {
        return $this->belongsTo('App\user');
    }
}
