<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientReportAddress extends Model
{
    protected $fillable = [
        "current",
        "street",
        "city",
        "state",
        "zip",
        "type",
        "ain",
        "geographical_code",
        "date_reported",
    ];

    public function clientReport()
    {
        return $this->belongsTo('App/ClientReport');
    }
}
