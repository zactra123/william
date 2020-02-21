<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

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
     * Scope a query to only include users with client role.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeClients($query)
    {
        return $query->where('users.role',  'client');
    }

    /**
     * Scope a query to only include users with receptionist role.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeReceptionists($query)
    {
        return $query->where('users.role',  'receptionist');
    }


    public function affiliateFullName()
    {
        $affiliate = DB::table('users')
            ->leftJoin('affiliates', 'affiliates.user_id', '=', 'users.id')
            ->leftJoin('users as u', 'u.id', '=', 'affiliates.affiliate_id')
            ->where('users.id', $this->id)
            ->select(DB::raw('CONCAT(u.last_name, " ",u.first_name) AS full_name'))
            ->first();

        $full_name = $affiliate->full_name?$affiliate->full_name:null;

        return $full_name;
    }

    public function referredBy()
    {
        $referredBy = ' ';
        if(!empty($this->clientDetails) && !empty($this->clientDetails->referred_by)){
            $referredBy = $this->clientDetails->referred_by;

        }elseif($this->affiliateFullName()!= null){
            $referredBy = $this->affiliateFullName();
        }
        return $referredBy;
    }


    public function affilate()
    {
        return $this->belongsTo('App\User','affiliates', 'user_id', 'affiliate_id');
    }

    public function clientDetails()
    {
        return $this->hasOne('App\ClientDetail');
    }

    public function ipAddress()
    {
        return $this->hasMany('App\AllowedIp');
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
