<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'role',
        'active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Scope a query to only include popular users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeClients($query)
    {
        return $query->where('users.role',  'client');
    }

    public function affiliate()
    {
        return $this->belongsTo('App\User', 'user_id', 'affiliate_id');
    }

    public function clientDetails()
    {
        return $this->hasOne('App\ClientDetail');
    }


    public function clientAttachments()
    {
        return $this->hasMany('App\ClientAttachment');
    }

    public function adminSpecifications()
    {
        return $this->belongsToMany('App\NegativeType', 'admin_specifications', 'user_id', 'negative_types_id');
    }


    public function full_name()
    {
        return ucfirst($this->first_name) . ' ' . ucfirst($this->last_name);

    }
}
