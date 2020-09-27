<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientReportExInquiry extends Model
{
    protected $table = 'client_report_ex_inquiries';

    protected $fillable = [
        'client_report_id',
        'is_dispute',
        'under_dispute',
        'subscriber_id',
        'negative_item',
        'ain',
        'end_user',
        'source_name',
        'source_address_street',
        'source_address_city',
        'source_address_state',
        'source_address_zip',
        'source_address_phone',
        'source_address_phone_type',
        'date_of_inquiry',
        'comment',
        'permissible_purpose',
    ];

    public function clientReport()
    {
        return $this->belongsTo('App\ClientReport');
    }
}
