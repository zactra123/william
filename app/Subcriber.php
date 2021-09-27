<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcriber extends Model
{
    protected $table = 'subcriber';


    // public $rules = [
    //     'email' => 'required',
    // ];

    protected $fillable =[
      'id',
      'email'
    ];

}
