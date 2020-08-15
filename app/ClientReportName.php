<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientReportName extends Model
{
    protected $fillable = [
        'client_report_id',
        'full_name',
        'nin',
    ];

    public function clientReport()
    {
        return $this->belongsTo('App/ClientReport');
    }
}
