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
        'spouse',
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

    public function clientExStatements()
    {
        return $this->hasMany('App\ClientReportExStatement');
    }
    public function clientTuStatements()
    {
        return $this->hasMany('App\ClientReportTuStatement');
    }

    public function clientExPublicRecords()
    {
        return $this->hasMany('App\ClientReportExPublicRecord');
    }

    public function clientExAccounts()
    {
        return $this->hasMany('App\ClientReportExAccount');
    }
    public function clientExInquiry()
    {
        return $this->hasMany('App\ClientReportExInquiry');
    }

    public function clientTuSummary()
    {
        return $this->hasOne('App\ClientReportTuSummary');
    }

    public function clientTuPublicRecords()
    {
        return $this->hasMany('App\ClientReportTuPublicRecord');
    }

    public function clientTuAccounts()
    {
        return $this->hasMany('App\ClientReportTuAccount');
    }

    public function clientTuInquiries()
    {
        return $this->hasMany('App\ClientReportTuInquiry');
    }

}
