<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    protected $table = 'reviews';

    // public $rulesUpdate = [
    //     'id' => 'bigIncrements',
    //     'user_id' =>'longText',
    //     'name'=>'longText',
    //     'email'=>'longText',
    //     'rating'=>'longText',
    //     'review'=>'longText'
    // ];

    protected $fillable = [
        'id',
        'user_id',
        'name',
        'email',
        'rating',
        'review'
    ];



}
