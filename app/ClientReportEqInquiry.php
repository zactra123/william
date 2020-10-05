<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientReportEqInquiry extends Model
{
    protected $table = 'client_report_eq_inquiries';
    protected $fillable = [
        'client_report_id',
        'date_inquiry',
        'industry_name',
        'street',
        'city',
        'state',
        'zip',
        'industry_code',
        'name',
        'phone'
    ];

    public function clientReport()
    {
        return $this->belongsTo('App\ClientReport');
    }

}