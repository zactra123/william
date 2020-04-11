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

    public function chats()
    {
        return $this->hasMany('App\Chat');
    }

    public function chatMessages($params)
    {
        if ($params["type"] == "User"){
            return $this->hasMany('App\Chat')
                ->leftJoin('guest', 'chat.recipient_id', '=', 'guest.id')
                ->where(
                        ["recipient_type" => "User",
                            "recipient_id"=> $params["id"]
                        ]
                    )
                ->orWhere([
                    "recipient_type"=> "'Guest'",
                    "guest.user_id"=> $params["id"]
                ]);
        }else {
            return $this->hasMany('App\Chat')
                ->leftJoin('guest', 'chat.recipient_id', '=', 'guest.id')
                ->where(
                    ["recipient_type" => "Guest",
                        "recipient_id" => $params["id"]
                    ]
                );
        }
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


    public function chat_list()
    {
        $chats = DB::table('chat')
            ->leftJoin('guest', function($join)
            {
                $join->on('chat.recipient_id', '=', 'guest.id');
                $join->on('chat.recipient_type','=', DB::raw("'Guest'"));
            })
            ->leftJoin('users', function($join)
            {
                $join->on('chat.recipient_id', '=', 'users.id');
                $join->on('chat.recipient_type','=', DB::raw("'User'"));
            })
            ->groupBy(['recipient_id', 'recipient_type'])
            ->where(['chat.user_id'=> $this->id, 'guest.user_id'=> null])
            ->orderBy('chat.created_at', 'DESC')
            ->select('recipient_id as id', 'recipient_type as type',
                DB::raw('CASE WHEN chat.recipient_type = "Guest" THEN guest.full_name ELSE CONCAT(users.first_name, " ",users.last_name ) END AS full_name'),
                DB::raw('CASE WHEN chat.recipient_type = "Guest" THEN guest.email ELSE users.email END AS email'),

                DB::raw("SUM(CASE WHEN unread = '1' AND type = 'to' THEN 1 ELSE 0 END) AS message")  )
            ->get()->toArray();

        return $chats;
    }
}
