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

    public function showDetails()
    {
        $berau = ClientReport::REPORT_TYPES[$this->clientReport->type];
        $name =  $this->statement;
        return "$berau : $name";
    }

    public function dispute()
    {
        return $this->belongsTo("App\Disputable", 'id','disputable_id')->where('disputables.disputable_type', 'App\\ClientReportExStatement');
    }


}
