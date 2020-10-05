<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientReportTuStatement extends Model
{
    protected $table = 'client_report_tu_statements';

    protected $fillable = [
        'client_report_id',
        'type',
        'statement',
        'description',
    ];

    public function clientReport()
    {
        return $this->belongsTo('App/ClientReport');
    }
}