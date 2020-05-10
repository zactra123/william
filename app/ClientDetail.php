<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientDetail extends Model
{

//  Client_detail table name;
    protected $table = 'client_details';


    public $rulesUpdate = [
        'user_id' => 'required',
        'ssn' =>'required',
        'dob'=> 'required, date',
        'sex'=> 'required,in: F, M, O',
        'state' => 'required',
        'city' => 'required',
        'address' =>'required',
        'zip' => 'required',
        'expiration' => 'required',
        'phone_number' => 'required',
        'referred_by' => 'required',
        'business_name' => 'required',
    ];

    protected $fillable = [
        'user_id',
        'ssn',
        'dob',
        'sex',
        'number',
        'name',
        'state',
        'city',
        'address',
        'zip',
        'expiration',
        'phone_number',
        'referred_by',
        'business_name',
        'registration_steps',
    ];

    public function user()
    {
        return $this->belongsTo('App\user');
    }



}
