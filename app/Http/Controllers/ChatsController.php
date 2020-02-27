<?php

namespace App\Http\Controllers;

use App\Guest;
use App\Chat;
use Illuminate\Http\Request;
use App\Events\ReceptionistLiveChat;
use Illuminate\Support\Facades\Broadcast;
use Response;
use App\User;

use Active;



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

        $dif = array_diff($receptionistId, $chatUserId);

        if(!empty($dif))
        {
           $userId =  $dif[array_rand($dif)];
        }else{
            $userId = $receptionistId[array_rand($receptionistId)];
        }

        $guest = Guest::create([
            "full_name" => $request->full_name,
            "email" => $request->email,
            "phone" => $request->phone
        ]);
        $request->session()->put("guest", $guest->id);

        $message = Chat::create([
            "message" => $request->message,
            "recipient_type" => "Guest",
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
        $messages = Chat::where("recipient_type", $request->type)
                        ->where("recipient_id", $request->id)
                        ->get()->toArray();
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
       if ($requests->recipient_type == "guest") {
           $last_message = Chat::where("recipient_type", $requests->recipient_type)
               ->where("recipient_id", $requests->recipient_id)
               ->first();

           $new_message = Chat::create([
               "recipient_type" => $requests->recipient_type,
               "recipient_id" => $requests->recipient_id,
               "message" => $requests->message,
               "user_id" => $last_message->user_id
           ]);
           broadcast(new ReceptionistLiveChat($new_message));
           return Response::json(["messages" => $new_message]);
       }

    }
}
