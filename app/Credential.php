<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Credential extends Model
{
    //  Client_detail table name;
    protected $table = 'credentials';



    protected $fillable = [
        'user_id',
        'ck_login',
        'ck_password',
        'ex_login',
        'ex_password',
        'tu_login',
        'tu_password',


    ];

    public function user()
    {
        return $this->belongsTo('App\user');
    }

}
