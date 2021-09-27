<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountTypeKeyWord extends Model
{
    protected $table = 'account_type_key_word';
    protected $fillable = [
        'account_type_key_id',
        'account_type_id'
    ];

    public function accountType()
    {
        return $this->belongsTo('App\AccountType');
    }
    public function accountTypeKey()
    {
        return $this->belongsTo('App\AccountTypeKey');
    }
}
