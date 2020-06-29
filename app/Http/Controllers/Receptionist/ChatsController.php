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
use App\User;



class ChatsController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'receptionist']);
    }

    public function index(Request $request)
    {
        $chats = Auth::user()->chat_list($request->only("type", "term", "order", "all"));
        $unreads = Auth::user()->unreads(["id" => Auth::user()->id, "type" => "to"]);
        $all_unreads = User::unreads(["type" => "to"]);
        if ($request->ajax()){
            $data = [
                "chats" => $chats,
                "unreads" => $unreads
                ];
            return Response::json($data);
        }
        return view('receptionist.live-chat.index', compact('chats', 'unreads','all_unreads'));
    }

    public function show(Request $request)
    {
       $chatMessage =  Auth::user()->chatMessages($request->only("type", "id"))
           ->with(["admin", "recipient"])->select("chat.*");

       $updateChatMessageStatus = $chatMessage->update(['unread'=>false]);

       $chatMessage = $chatMessage->get();
       $recipientData = $request->only("type", "id");

        $chats = Auth::user()->chat_list($request->only("type", "order", "term"));
        $unreads = Auth::user()->unreads(["id" => Auth::user()->id, "type" => "to"]);
        $all_unreads = User::unreads(["type" => "to"]);


        $data = [
            'chatMessage' =>$chatMessage,
            'recipient' =>$recipientData,
            'chats' => $chats,
            'unreads' => $unreads,
            'all_unreads'=> $all_unreads

       ] ;
        return Response::json($data);
    }


    public function create(Request $request)
    {

        $user = Auth::user();
        $new_message = Chat::create([
            "message" => $request->answer,
            "recipient_type" => "App\\{$request->recipient_type}",
            "recipient_id" => $request->recipient_id,
            "user_id" => $user->id,
            "private" =>  (int) $request->direct,
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
        dd("test");
        $chats = Auth::user()->chat_list();
        $unreads = array_sum(array_map('intval',array_column($chats, "message")));
        return Response::json($unreads);
    }

}
