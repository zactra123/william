<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExperianReportNumber extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_id',
        'number',
        'date_generated',
        'status',
    ];

    public function client(){
        $this->belongsTo('App\User');
    }
}
