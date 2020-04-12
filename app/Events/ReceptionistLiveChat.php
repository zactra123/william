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

        if($data->recipient_type == 'guest'){
            $guest = Guest::where('id', $data->recipient_id)->first();
            $this->message = [
                "recipient_type" => $guest->user_id != null ? "User" : $data->recipient_type,
                "recipient_id" => $guest->user_id != null ? $guest->user_id : $data->recipient_id,
                "message" => $data->message,
                "user_id" => $data->user_id,
                "private" => $data->private,
                "updated_at" => $data->updated_at,
                "created_at" => $data->created_at,
                "id" => $data->id,
            ];

        }else{
            $this->message = $data;
        }


        $admin = User::find($data->user_id);
        $this->recipient_lists = $admin->chat_list();

        $this->unreads = array_sum(array_map('intval',array_column($this->recipient_lists, "message")));


    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        $userId = !isset($this->message->user_id)?$this->message['user_id']:$this->message->user_id;
//        dd("ReceptionistLiveChat.{$this->message->user_id}");
        return new Channel("ReceptionistLiveChat.{$userId}");
    }
}
