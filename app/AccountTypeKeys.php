<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountTypeKeys extends Model
{
    protected $table = 'account_type_keys';
    protected $fillable = [
        'key_word',
    ];

    public function accountTypeKeyWord()
    {
        return $this->hasMany('App\AccountTypeKeyWord');
    }
}
