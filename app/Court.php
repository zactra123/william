<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Court extends Model
{
    protected $table = 'courts';

    protected $fillable = [
        'name',
        'path',
        'type',
        'street',
        'city',
        'state',
        'zip',
        'phone_number',
        'fax_number',
        'email',
    ];
    const TYPES = [
        1 => "FEDERAL",
        2 => "STATE"
    ];

    public function checkUrlAttribute()
    {
        return Storage::disk('s3')->has($this->path);
    }

    public function getUrlAttribute()
    {
        return Storage::disk('s3')->url($this->path);
    }

    public function equalCourts()
    {
        return $this->hasMany('App\EqualCourt');
    }

    public function courtJudges()
    {
        return $this->hasMany('App\CourtJudge');
    }





}
