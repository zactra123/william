<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class   User extends Authenticatable implements MustVerifyEmail
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

    public function credentials()
    {
        return $this->hasOne('App\Credential');
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
            return Chat::where(
                        [
                            "recipient_type" => 'App\\User',
                            "recipient_id"=> $params["id"]
                        ]
                    );
        }else {
            return Chat::leftJoin('guest', 'chat.recipient_id', '=', 'guest.id')
                ->where(
                    ["recipient_type" => "App\\Guest",
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


    public function chat_list($params = [])
    {
        $chats = DB::table('chat');
        if (empty($params["all"])) {
            $chats = $chats->where(['chat.user_id'=> $this->id]);
        }

        if (!empty($params["type"]) && $params["type"] == "Guest") {
            $chats = $chats->leftJoin('guest', function($join) {
                $join->on('chat.recipient_id', '=', 'guest.id')
                    ->where('chat.recipient_type','=', 'App\\Guest');
            })
                ->leftJoin('users', "users.id", '=', 'guest.user_id')
                ->whereNotNull('guest.id')
                ->select(
                    "chat.recipient_id as recipient_id",
                    DB::raw("'Guest' as recipient_type"),
                    "guest.full_name as full_name",
                    "guest.phone as phone",
                    "guest.email as email",
                    DB::raw("CONCAT(users.first_name, ' ', users.last_name) as user_full_name"),
                    DB::raw("users.id as user_id"),
                    DB::raw("SUM(CASE WHEN unread = '1' AND type = 'to' THEN 1 ELSE 0 END) AS message")
                );
            if (!empty($params["term"])){
                $chats = $chats->where(function($query) use ($params) {
                    $query->orWhere("guest.full_name",  "LIKE",  "%{$params["term"]}%")
                        ->orWhere("guest.email",  'like', "%{$params["term"]}%");
                    });
            }
        } else {
            $chats = $chats->leftJoin('users', function($join) {
                $join->on('chat.recipient_id', '=', 'users.id')
                    ->where('chat.recipient_type','=', 'App\\User');
            })
                ->leftJoin("client_details", "client_details.user_id", "users.id")
                ->whereNotNull('users.id')
                ->select(
                    "chat.recipient_id as recipient_id",
                    DB::raw("'User' as recipient_type"),
                    DB::raw("CONCAT(users.first_name, ' ', users.last_name) as full_name"),
                    "client_details.phone_number as phone",
                    "users.email as email",
                    DB::raw("SUM(CASE WHEN unread = '1' AND type = 'to' THEN 1 ELSE 0 END) AS message")
                );
            if (!empty($params["term"])){
                $chats = $chats->where(function($query) use ($params) {
                    $query->orWhere( DB::raw("CONCAT(users.first_name, ' ', users.last_name)"),  "LIKE",  "%{$params["term"]}%")
                        ->orWhere("users.email",  'LIKE', "%{$params["term"]}%");
                });
            }
        }


        $chats = $chats->groupBy([
            'chat.recipient_id',
            "chat.recipient_type"
        ]);

        $chats = $chats->orderBy('chat.created_at', 'DESC');
        if (!empty($params["order"]) && $params["order"] == "unreads") {
            $chats = $chats->orderBy(DB::raw("SUM(CASE WHEN unread = '1' AND type = 'to' THEN 1 ELSE 0 END)"), 'DESC');

        }



        return $chats->get()->toArray();
    }

    public static function unreads($params = [])
    {
        $result = Chat::where("unread", 1);

        if (!empty($params["id"])) {
            $result = $result->where("user_id", $params["id"]);
        }
        if (!empty($params["type"])) {
            $result = $result->where("type", $params["type"]);
        }
        $result = $result->groupBy("recipient_type")
            ->select(DB::raw('COUNT(unread) as unreads'),"recipient_type")
            ->pluck('unreads', "recipient_type")
            ->toArray();
        return $result;
    }

}
