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
    ];

    protected $fillable = [
        'user_id',
        'ssn',
        'dob',
        'sex',
        'state',
        'city',
        'address',
        'zip',

    ];

    public function user()
    {
        return $this->belongsTo('App\user');
    }



}
