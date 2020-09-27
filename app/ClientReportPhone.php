<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientReportPhone extends Model
{
    protected $fillable = [
        'current',
        'number',
        'type'
    ];

    public function clientReport()
    {
        return $this->belongsTo('App/ClientReport');
    }
}
