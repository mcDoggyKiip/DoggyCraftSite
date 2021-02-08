<?php

namespace App\Events;

use App\Gamemode;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class GamemodeStatusChanged implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $gamemode;

    /**
     * Create a new event instance.
     *
     * @param Gamemode $gamemode
     */
    public function __construct(Gamemode $gamemode)
    {
        $this->gamemode = $gamemode;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('gamemode-change.'.$this->gamemode->id);
    }

    public function broadcastWith(){
        if($this->gamemode->status()['online']){
            $status = "Online";
        }else{
            $status = "Offline";
        }

        $extra = [
            'status' => $status,
            'players' => $this->gamemode->status()['players'],
            'max_players' => $this->gamemode->status()['max_players'],
        ];

        return array_merge($this->gamemode->toArray(), $extra);
    }
}
