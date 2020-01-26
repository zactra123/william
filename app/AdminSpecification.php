<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminSpecification extends Model
{
    protected $table = 'admin_specifications';

    protected $fillable = [
        'user_id',
        'negative_types_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function negativeTypes()
    {
        return $this->belongsTo('App\NegativeType', 'negative_types_id');
    }






}
