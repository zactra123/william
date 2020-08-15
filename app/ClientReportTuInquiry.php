<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientReportTuInquiry extends Model
{
    protected $table = 'client_report_tu_inquiries';

    protected $fillable = [
        'client_report_id',
        'inquiry_type',
        'inquiry_id',
        'industry_code',
        'member_code',
        'description',
        'owner',
        'date_of_inquiry',
        'permissible_purpose',
        'subscriber_name',
        'requestor_name',
        'subscriber_type',
        'date',
        'requested_on_dates',
        'requested_dates',
        'inquiry_dates',
        'address',
        'city',
        'state',
        'zip',
        'phone',
    ];

    public function clientReport()
    {
        return $this->belongsTo('App/ClientReport');
    }
}
