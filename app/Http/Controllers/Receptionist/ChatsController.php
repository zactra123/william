<?php

namespace App\Http\Controllers\Receptionist;

use App\Events\LiveChat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Response;
use Auth;
use App\Chat;



class ChatsController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'receptionist']);
    }

    public function index(Request $request)
    {
        $unreads = Chat::where([
            ["user_id", Auth::user()->id],
            ["unread", 1]
            ])
            ->groupBy("recipient_type")
            ->select(DB::raw('COUNT(unread) as unreads'),"recipient_type")
            ->pluck('unreads', "recipient_type");

        $params = ["type"=> "Guest"];
        $chats = Auth::user()->chat_list($params);

//        $unreads = array_sum(array_map('intval',array_column($chats, "message")));
        return view('receptionist.live-chat.index', compact('chats', 'unreads'));
    }

    public function show(Request $request)
    {

       $chatMessage =  Auth::user()->chatMessages($request->only("type", "id"))->select("chat.*");

       $updateChatMessageStatus = $chatMessage->update(['unread'=>false]);

       $chatMessage = $chatMessage->get();
       $recipientData = ['id'=> $request->id, 'type' =>$request->type];

        $chats = Auth::user()->chat_list();

       $data = [
           'chatMessage' =>$chatMessage,
           'recipient' =>$recipientData,
           'chats' => $chats

       ] ;


        return Response::json($data);
    }


    public function create(Request $request)
    {

        $user = Auth::user();
        $new_message = Chat::create([
            "message" => $request->answer,
            "recipient_type" => $request->recipient_type,
            "recipient_id" => $request->recipient_id,
            "user_id" => $user->id,
            "private" =>  (int) $request->private,
            "type" => "from"
        ]);

        broadcast(new LiveChat($new_message));

        $chatMessage =  Auth::user()
            ->chatMessages(["type" =>$request->recipient_type, "id" => $request->recipient_id])
            ->select("chat.*");


        $updateChatMessageStatus = $chatMessage->update(['unread'=>false]);

        $chatMessage = $chatMessage->get();
        $chats =$user->chat_list();

        $recipientData = ['id'=> $request->recipient_id, 'type' =>$request->recipient_type];
        $data = [
            'chatMessage' =>$chatMessage,
            'recipient' =>$recipientData,
            'chats' => $chats
        ] ;

        return Response::json($data);

    }

    public function unreads(Request $request)
    {
        $chats = Auth::user()->chat_list();
        $unreads = array_sum(array_map('intval',array_column($chats, "message")));
        return Response::json($unreads);
    }

}
