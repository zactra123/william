<?php

namespace App\Http\Controllers;

use App\Guest;
use App\Chat;
use Illuminate\Http\Request;
use App\Events\LiveChat;
use Response;
use App\User;


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
        $receptionist = User::receptionists()->get()->random();
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
            "user_id" => $receptionist->id,
            "type" => "to"
        ]);

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
    public function postNewMessage($id)
    {

    }
}
