<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class State extends Model
{
    protected $table = 'states';
    protected $fillable = ['full_name', 'name', 'type', 'n_default_date', 'n_sale_date', 'auction_date'];

    const TYPES = [
        1 => "NONJUDICIAL",
        2 => "JUDICIAL"
    ];


    public function flag(){
        return Storage::disk('s3')->url($this->path);
    }
}
