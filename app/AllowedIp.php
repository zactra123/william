<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AllowedIp extends Model
{
    protected $table = 'allowed_ips';

    protected $fillable = [
        'user_id',
        'ip_address'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
