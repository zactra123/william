<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NegativeType extends Model
{

    protected $table = 'negative_types';

    protected $fillable = [
        'name'
    ];


    public function adminSpecification()
    {
        return $this->belongsTo('App\AdminSpecification');
    }


}
