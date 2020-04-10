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
        $chats = Auth::user()->chat_list();

        $unreads = array_sum(array_map('intval',array_column($chats, "message")));
        return view('receptionist.live-chat.index', compact('chats', 'unreads'));
    }

    public function show(Request $request)
    {
       $chatMessage =  Chat::where('recipient_type', $request->type)
            ->where('recipient_id', $request->id);

       $updateChatMessageStatus = $chatMessage ->update(['unread'=>false]);

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
            "type" => "from"
        ]);
        broadcast(new LiveChat($new_message));

        $chatMessage =  Chat::where('recipient_type', $request->recipient_type)
            ->where('recipient_id', $request->recipient_id);


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
