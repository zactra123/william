<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientReportExPublicRecord extends Model
{
    protected $fillable = [
        'is_dispute',
        'under_dispute',
        'negative_item',
        'date_filed',
        'date_resolved',
        'responsibility',
        'claim_amount',
        'liability_amount',
        'source_name',
        'source_id',
        'location_number',
        'source_address_street',
        'source_address_city',
        'source_address_state',
        'source_address_zip',
        'source_address_phone',
        'source_address_phone_type',
        'ain',
        'your_statement',
        'reinvestigation',
        'plaintiff',
        'status',
        'on_record_until',
    ];

    public function clientReport()
    {
        return $this->belongsTo('App/ClientReport');
    }

    public function showDetails()
    {
        $berau = ClientReport::REPORT_TYPES[$this->clientReport->type];
        $name =  $this->source_name.' #'.$this->source_id;
        return "$berau : $name";
    }

    public function dispute()
    {
        return $this->belongsTo("App\Disputable", 'id','disputable_id')->where('disputables.disputable_type', 'App\\ClientReportExPublicRecord');
    }
}
