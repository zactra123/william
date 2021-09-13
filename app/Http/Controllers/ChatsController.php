<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Broadcast;
use App\Events\ReceptionistLiveChat;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Events\LiveChat;
use App\Guest;
use App\Chat;
use App\User;
use Response;
use Active;
use Auth;




class ChatsController extends Controller
{

    /* identifyUser must
     * create a guest and put guest id to session
     * save message
     * broadcast to LiveChat for random receptionist
     *
     *  received params ["full_name","email","phone","message"]
     *  returned response
     */
    public function identifyUser(Request $request)
    {

        $actives = Active::usersWithinMinutes(60)->get();
        $receptionistId = [];
        foreach($actives as $users){
            if($users->user->role == 'receptionist'){
                $receptionistId[] = $users->user->id;
            }
        }
        $timeInterval  = date('Y-m-d H:i:s',  strtotime("-1 day"));
        $chatUserId =Chat::where('created_at','>',$timeInterval)
            ->distinct('user_id')
            ->pluck('user_id')->toArray();

        $dif = count($receptionistId)>count($chatUserId)?array_diff($receptionistId, $chatUserId):$receptionistId;

        if(!empty($dif))
        {
           $userId =  $dif[array_rand($dif)];
        }elseif (!empty($dif)) {
            $userId = $receptionistId[array_rand($receptionistId)];
        } else {
            $userId = User::where("role", 'receptionist')->orderByRaw("RAND()")->first()->id;
        }
        $user = User::where('email', $request->get('email'))->first();


        if(!empty($user)){
            $guest = Guest::where('user_id',$user->id)->where('email', $request->get('email'))->first();
            if(empty($guest)){
                $guest = Guest::create([
                    "user_id"=> $user->id,
                    "full_name" => $request->full_name,
                    "email" => $request->email,
                    "phone" => $request->phone
                ]);
            }

        }else{
            $guest = Guest::create([
                "user_id"=> null,
                "full_name" => $request->full_name,
                "email" => $request->email,
                "phone" => $request->phone
            ]);
        }
        $request->session()->put("guest", $guest->id);

        $message = Chat::create([
            "message" => $request->message,
            "recipient_type" => "App\\Guest",
            "recipient_id" => $guest->id,
            "user_id" => $userId,
            "type" => "to"
        ]);
        broadcast(new ReceptionistLiveChat($message));
        return Response::json(["guest"=> $guest, "message" => $message]);
    }

    /*
     *  getChatMessages should
     *
     *  get all messages for current guest
     *  received params $id which is recipient id and type
     *  returned response array of messages
     */
    public function getChatMessages(Request $request)
    {
        if(!empty(Auth::user())){

            $messages = DB::table('chat')
                ->leftJoin('guest', function($join)
                {
                    $join->on('chat.recipient_id', '=', 'guest.id')
                        ->where('guest.user_id', Auth::user()->id);
                    $join->on('chat.recipient_type','=', DB::raw("'App\\Guest'"))
                        ->where('guest.user_id', Auth::user()->id);
                })
                ->leftJoin('users', function($join)
                {
                    $join->on('chat.recipient_id', '=', 'users.id')
                        ->where('users.id', Auth::user()->id);
                    $join->on('chat.recipient_type','=', DB::raw("'User'"))
                        ->where('users.id', Auth::user()->id);;
                })
                ->select('chat.*')
                ->get()->toArray();

        }else{
            $messages = Chat::where("recipient_type", "App\\{$request->type}")
                ->where("recipient_id", $request->id)
                ->get()->toArray();
        }
        return Response::json(["messages" => $messages]);
    }

    /*
     *  getChatMessages should
     *  save the message
     *  broadcast message to current receptionist
     *
     *  received params ["recipient_type","recipient_id","message"]
     *  returned response the created message
     */
    public function postNewMessage(Request $requests)
    {
        $type = $requests->recipient_type=='guest'?'App\\Guest':'App\\User';

        $last_message = Chat::where("recipient_type", $type)
            ->where("recipient_id", $requests->recipient_id)
            ->first();

        if(empty($last_message)){
            $actives = Active::usersWithinMinutes(60)->get();
            $receptionistId = [];
            foreach($actives as $users){
                if($users->user->role == 'receptionist'){
                    $receptionistId[] = $users->user->id;
                }
            }

            $timeInterval  = date('Y-m-d H:i:s',  strtotime("-1 day"));
            $chatUserId =Chat::where('created_at','>',$timeInterval)
                ->distinct('user_id')
                ->pluck('user_id')->toArray();

            $dif = array_diff($receptionistId, $chatUserId);

            if(!empty($dif))
            {
                $userId =  $dif[array_rand($dif)];
            }else{
                $userId = $receptionistId[array_rand($receptionistId)];
            }

            $new_message = Chat::create([
                "recipient_type" => "App\\{$requests->recipient_type}",
                "recipient_id" => $requests->recipient_id,
                "message" => $requests->message,
                "user_id" => $userId,
                "private" => $requests->recipient_type == 'user'?true:false,
            ]);


        }else{

            $new_message = Chat::create([
                "recipient_type" => $type,
                "recipient_id" => $requests->recipient_id,
                "message" => $requests->message,
                "user_id" => $last_message->user_id,
                "private" => $requests->recipient_type == 'user'? true:false,
            ]);

        }

        broadcast(new ReceptionistLiveChat($new_message));
        return Response::json(["messages" => $new_message]);

//        if ($requests->recipient_type == "guest") {
//           $last_message = Chat::where("recipient_type", $requests->recipient_type)
//               ->where("recipient_id", $requests->recipient_id)
//               ->first();
//
//           $new_message = Chat::create([
//               "recipient_type" => $requests->recipient_type,
//               "recipient_id" => $requests->recipient_id,
//               "message" => $requests->message,
//               "user_id" => $last_message->user_id,
//               "private" => false,
//           ]);
//           broadcast(new ReceptionistLiveChat($new_message));
//           return Response::json(["messages" => $new_message]);
//       }


    }
}
