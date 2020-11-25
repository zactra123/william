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

    public function showDetails()
    {
        $berau = ClientReport::REPORT_TYPES[$this->clientReport->type];
        $name =  $this->industry_name;

        return "$berau : $name";
    }
    public function dispute()
    {
        return $this->belongsTo("App\Disputable", 'id','disputable_id')->where('disputables.disputable_type', 'App\\ClientReportEqInquiry');
    }

}
