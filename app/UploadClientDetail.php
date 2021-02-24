<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UploadClientDetail extends Model
{
    protected $table = 'upload_client_details';

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'ssn',
        'dob',
        'sex',
        'name',
        'number',
        'state',
        'city',
        'address',
        'zip',
        'expiration'

    ];

    public function full_name()
    {
        if($this->first_name != null && $this->last_name){
            return ucfirst($this->first_name) . ' ' . ucfirst($this->last_name);
        }else{
            return null;
        }

    }

    public function full_address()
    {
        return ucfirst($this->address) . ' ' . ucfirst($this->zip);
    }
}
