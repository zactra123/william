<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourtJudges extends Model
{
    protected $table = 'equal_courts';

    protected $fillable = [
        'court_id',
        'full_name',
        'email',
        'phone_number',
        'room_number',
    ];

    public function court()
    {
        return $this->belongsTo('App\Court');
    }
}
