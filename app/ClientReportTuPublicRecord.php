<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientReportTuPublicRecord extends Model
{
    protected $table = 'client_report_tu_public_records';

    protected $fillable = [
        'client_report_id',
        'suppression_indicator',
        'name',
        'public_record_handle',
        'address',
        'street',
        'city',
        'state',
        'zip',
        'docket_number',
        'phone',
        'date_effective',
        'liabilities',
        'date_effective_label',
        'date_filed',
        'date_paid',
        'type',
        'court_type',
        'court_type_description',
        'responsibility',
        'assets',
        'amount',
        'plaintiff',
        'plaintiff_attorney',
        'estimated_deletion_date',
        'how_filed',
        'status',
        'on_record_until',
        'assets_amount',
        'exempt_amount',
        'remarks',
    ];

    public function clientReport()
    {
        return $this->belongsTo('App/ClientReport');
    }
}
