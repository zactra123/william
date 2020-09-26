<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EqualBank extends Model
{
    protected $fillable = ['bank_logo_id', 'name'];

    public function bank()
    {
        return $this->belongsTo('App\BankLogo');
    }
}
