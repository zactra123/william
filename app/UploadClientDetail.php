<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UploadClientDetail extends Model
{
    protected $table = 'upload_client_details';

    protected $fillable = [
        'user_id' => 'required',
        'first_name',
        'last_name',
        'ssn' =>'required',
        'dob'=> 'required, date',
        'sex'=> 'required,in: F, M, O',
        'state' => 'required',
        'city' => 'required',
        'address' =>'required',
        'zip' => 'required',

    ];

}
