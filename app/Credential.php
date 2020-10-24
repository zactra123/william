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
        'tu_question',
        'tu_answer',
        'tu_dis_login',
        'tu_dis_password',
        'eq_login',
        'eq_password'
    ];

    public function user()
    {
        return $this->belongsTo('App\user');
    }


    public function is_present()
    {
        return $this->eq_present() && $this->tu_dis_present() && $this->tu_present() && $this->ck_present();
    }

    public function ck_present()
    {
        return $this->ck_login && $this->ck_password;
    }

    public function ex_present()
    {
        return $this->ex_login && $this->ex_password && $this->ex_question && $this->ex_pin;
    }

    public function tu_present()
    {
        return  $this->tu_login && $this->tu_password && $this->tu_question && $this->tu_answer;
    }

    public function tu_dis_present()
    {
        return $this->tu_dis_login && $this->tu_dis_password;
    }

    public function eq_present()
    {
        return $this->eq_login && $this->eq_password;
    }

}
