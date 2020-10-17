<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disputable extends Model
{
    protected $table = 'disputables';

    protected $fillable = [
        'todo_id',
        'disputable_type',
        'disputable_id',
        'status'
    ];
    const STATUS = [
        '0'=>'ACTIVE',
        '1'=>'PENDING',
        '2'=>'COMPLETED',
    ];

    public function disputable()
    {
        return $this->morphTo();
    }

    public function clientReportName()
    {
        return $this->belongsTo('App\ClientReportName','disputable_id', 'id');
    }

    public function clientReportAddress()
    {
        return $this->belongsTo('App\ClientReportAddress','disputable_id', 'id');
    }

    public function clientReportPhone()
    {
        return $this->belongsTo('App\ClientReportPhone','disputable_id', 'id');
    }

    public function clientReportEmployer()
    {
        return $this->belongsTo('App\ClientReportEmployer','disputable_id', 'id');
    }

    public function clientReportExAccount()
    {
        return $this->belongsTo('App\ClientReportExAccount','disputable_id', 'id');
    }

    public function clientReportExInquiry()
    {
        return $this->belongsTo('App\ClientReportExInquiry','disputable_id', 'id');
    }

    public function clientReportExPublicRecord()
    {
        return $this->belongsTo('App\ClientReportExPublicRecord','disputable_id', 'id');
    }

    public function clientReportExStatement()
    {
        return $this->belongsTo('App\ClientReportExStatement','disputable_id', 'id');
    }
    public function clientReportTuAccount()
    {
        return $this->belongsTo('App\ClientReportExAccount','disputable_id', 'id');
    }

    public function clientReportTuInquiry()
    {
        return $this->belongsTo('App\ClientReportExInquiry','disputable_id', 'id');
    }

    public function clientReportTuPublicRecord()
    {
        return $this->belongsTo('App\ClientReportExPublicRecord','disputable_id', 'id');
    }

    public function clientReportTuStatement()
    {
        return $this->belongsTo('App\ClientReportExStatement','disputable_id', 'id');
    }


    public function clientReportEqAccount()
    {
        return $this->belongsTo('App\ClientReportExAccount','disputable_id', 'id');
    }

    public function clientReportEqInquiry()
    {
        return $this->belongsTo('App\ClientReportExInquiry','disputable_id', 'id');
    }

    public function clientReportEqPublicRecord()
    {
        return $this->belongsTo('App\ClientReportExPublicRecord','disputable_id', 'id');
    }


    public function todo()
    {
        return $this->belongsTo('App\Todo');
    }
}
