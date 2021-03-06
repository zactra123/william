<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientReportEqPublicRecord extends Model
{
    protected $table = 'client_report_eq_public_records';
    protected $fillable = [
        'client_report_id',
        'category_type',
        'reference_number',
        'classification',
        'date_filed',
        'date',
        'status',
        'amount',
        'street',
        'city',
        'state',
        'zip',
        'phone',
        'name',
        'institution_code',
        'date_verified',
        'responsibility',
        'public_record_id',
        'type',
        'asset',
        'court_number',
        'trustee',
        'liability_amount',
        'exempt_amount'
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
        return $this->belongsTo("App\Disputable", 'id','disputable_id')->where('disputables.disputable_type', 'App\\ClientReportEqPublicRecord');
    }

}
