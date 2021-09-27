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

    public function showDetails()
    {
        $berau = ClientReport::REPORT_TYPES[$this->clientReport->type];
        return "$berau : $this->number";
    }
    public function dispute()
    {
        return $this->belongsTo("App\Disputable", 'id','disputable_id')->where('disputables.disputable_type', 'App\\ClientReportPhone');
    }


}
