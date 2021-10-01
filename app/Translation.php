<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    protected $table = 'translation';


    // public $rules = [
    //     'email' => 'required',
    // ];

    protected $fillable =[
      'id',
      'key',
      'english',
      'spanish',
      'french',
      'german'
    ];

}
