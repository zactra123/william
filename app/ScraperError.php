<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScraperError extends Model
{
    protected $table = 'scraper_errors';

    protected $fillable = [
        'user_id',
        'error',
    ];

    public function user()
    {
        return $this->belongsTo('App\user');
    }
}
