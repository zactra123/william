<?php

namespace App\Events;

use App\Guest;
use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class LiveChat implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($data)
    {
//        dd($data);
        $this->message = $data;

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        if ($this->message->recipient_type == "App\User") {
            $user = User::find($this->message->recipient_id);
            $guest = Guest::where("user_id", $user->id)->first();
        }
        if ($this->message->recipient_type == "App\Guest") {
            $guest = Guest::find($this->message->recipient_id);
            $user = User::find($guest->user_id);
        }
        $channels = [];

        if(!empty($user)) {
            array_push($channels,  new Channel("LiveChat.user_{$user->id}"));
        }

        if (!empty($guest)) {
            array_push($channels, new Channel("LiveChat.guest_{$guest->id}"));
        }
//      Yete admine patasxanuma guestin u guest-e kpaca clientin
//        petqa clientin u guestin uxarkenq
//      Yete uxarkela clientin petqa menak clientin gna

        return $channels;
    }
}
