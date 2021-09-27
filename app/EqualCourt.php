<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EqualCourt extends Model
{
    protected $table = 'equal_courts';

    protected $fillable = ['court_id', 'name'];

    public function court()
    {
        return $this->belongsTo('App\Court');
    }
}
