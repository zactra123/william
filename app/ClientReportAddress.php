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

    public function showDetails()
    {
        $berau = ClientReport::REPORT_TYPES[$this->clientReport->type];
        $address = $this->street.', '.$this->city.', '.$this->state.', '.$this->zip;
        return "$berau : $address";
    }
    public function dispute()
    {
        return $this->belongsTo("App\Disputable", 'id','disputable_id')->where('disputables.disputable_type', 'App\\ClientReportAddress');
    }


}
