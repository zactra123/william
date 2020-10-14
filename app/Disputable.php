<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disputable extends Model
{
    protected $table = 'disputables';

    protected $fillable = [
        'todo_id',
        'disputable_type',
        'disputable_id'
    ];


    public function todo()
    {
        return $this->belongsTo('App\Todo');
    }
}
