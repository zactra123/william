<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourtJudge extends Model
{
    protected $table = 'court_judges';

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
