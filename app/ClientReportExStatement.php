<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientReportExStatement extends Model
{
    protected $table = 'client_report_ex_statements';

    protected $fillable = [
        'client_report_id',
        'statement'
    ];

    public function clientReport()
    {
        return $this->belongsTo('App/ClientReport');
    }
}
