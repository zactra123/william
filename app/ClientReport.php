<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientReport extends Model
{
    protected $fillable = [
        'user_id',
        'type',
        'full_name',
        'ssn',
        'dob',
        'report_date',
        'report_number',
        'current_address',
        'current_phone',
        'file_path',
    ];

    public function user()
    {
        return $this->belongsTo('App\user');
    }

    public function clientNames()
    {
        return $this->hasMany('App\ClientReportName');
    }

    public function clientAddresses()
    {
        return $this->hasMany('App\ClientReportAddress');
    }

    public function clientPhones()
    {
        return $this->hasMany('App\ClientReportPhone');
    }

    public function clientEmployers()
    {
        return $this->hasMany('App\ClientReportEmployer');
    }

}
