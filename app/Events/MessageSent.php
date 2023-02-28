<?php

namespace App\Events;


use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

use App\Models\Chat;
//use App\Models\GamePredict;

class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $chat;
    
    public $choice;
    //public $gamePredict;
    
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct( Chat $chat , $choice)
    {
        $this->chat = $chat;
        
        $this->chat->user = $chat->user;
        
        $this->choice = $choice;
        
        //$this->gamePredict = $gamePredict;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('chat');
    }
}
