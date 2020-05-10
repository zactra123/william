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
        'ex_question',
        'ex_answer',
        'ex_pin',
        'tu_login',
        'tu_password',
        'eq_login',
        'eq_password'
    ];

    public function user()
    {
        return $this->belongsTo('App\user');
    }

}
