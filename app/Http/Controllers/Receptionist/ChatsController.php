<?php

namespace App\Http\Controllers\Receptionist;

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
       $userId  = Auth::user()->id;
       $chats = $this->chatList($userId);

        return view('receptionist.live-chat.index', compact('chats'));
    }

    public function show(Request $request)
    {
       $chatMessage =  Chat::where('recipient_type', $request->type)
            ->where('recipient_id', $request->id);

       $updateChatMessageStatus = $chatMessage ->update(['unread'=>false]);

       $chatMessage = $chatMessage->get();
       $recipientData = ['id'=> $request->id, 'type' =>$request->type];

       $userId  = Auth::user()->id;
       $chats = $this->chatList($userId);

       $data = [
           'chatMessage' =>$chatMessage,
           'recipient' =>$recipientData,
           'chats' => $chats

       ] ;


        return Response::json($data);
    }


    public function create(Request $request)
    {
        $userId = Auth::user()->id;
        Chat::create([
            "message" => $request->answer,
            "recipient_type" => $request->recipient_type,
            "recipient_id" => $request->recipient_id,
            "user_id" => $userId,
            "type" => "from"
        ]);

        $chatMessage =  Chat::where('recipient_type', $request->recipient_type)
            ->where('recipient_id', $request->recipient_id);


        $updateChatMessageStatus = $chatMessage ->update(['unread'=>false]);
        $chatMessage = $chatMessage->get();

        $chats = $this->chatList($userId);


        $recipientData = ['id'=> $request->recipient_id, 'type' =>$request->recipient_type];
        $data = [
            'chatMessage' =>$chatMessage,
            'recipient' =>$recipientData,
            'chats' => $chats
        ] ;


        return Response::json($data);

    }


    private function chatList($userId)
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
            ->where('chat.user_id', $userId)
            ->select('recipient_id as id', 'recipient_type as type', 'guest.full_name as full_name',
                DB::raw('CONCAT(users.last_name, " ",users.first_name) AS user_full_name'),

                DB::raw("SUM(CASE WHEN unread = '1' AND type = 'to' THEN 1 ELSE 0 END) AS message")  )
            ->get()->toArray();


        return $chats;
    }


}
