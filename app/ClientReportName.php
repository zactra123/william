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
        return $this->belongsTo('App\ClientReport');
    }


    public function showDetails()
    {
        $berau = ClientReport::REPORT_TYPES[$this->clientReport->type];
        return "$berau : $this->full_name";
    }

    public function dispute()
    {
        return $this->belongsTo("App\Disputable", 'id','disputable_id')->where('disputables.disputable_type', 'App\\ClientReportName');
    }
}
