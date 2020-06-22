<?php

namespace App\Events;

use App\User;
use App\Guest;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ReceptionistLiveChat implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $recipient_lists;
    public $unreads;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($data)
    {

        $this->message = $data;
        $admin = User::find($data->user_id);
        $this->recipient_lists = $admin->chat_list();
        $this->unreads = $admin->unreads(["id" => $admin->id, "type" => "to"]);


    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
//      Yete clientna Adminin harc grum menak admini mota gnum
//      Yete guesta adminin grum u gueste kpaca clientin
//        petqqa admini u clientin gna
        $userId = !isset($this->message->user_id)?$this->message['user_id']:$this->message->user_id;
//        dd("ReceptionistLiveChat.{$this->message->user_id}");
        return new Channel("ReceptionistLiveChat.{$userId}");
    }
}
