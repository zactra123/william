<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientAttachment extends Model
{
    //table of client attachment
    protected $table = 'client_attachment';



    public $rulesUpdate = [
        'user_id' => 'required',
        'path' =>'required',
        'name'=>'required',
        'type'=>'required',
    ];

    protected $fillable = [
        'user_id',
        'path',
        'name',
        'type'


    ];


    public function user()
    {
        return $this->belongsTo('App\user');
    }


}
