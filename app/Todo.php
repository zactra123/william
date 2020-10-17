<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $table = 'todos';

    protected $fillable = [
        'client_id',
        'user_id',
        'title',
        'description',
        'status',
        'due_date',
        'completed_date'
    ];
    const STATUS = [
        '0'=>'ACTIVE',
        '1'=>'PENDING',
        '2'=>'COMPLETED',
    ];


    public function disputes()
    {
        return $this->hasMany('App\Disputable');
    }
}
