<?php

namespace App\Listeners;

use App\Events\GamemodeStatusChanged;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class GamemodeStatusChangedListner
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  GamemodeStatusChanged  $event
     * @return void
     */
    public function handle(GamemodeStatusChanged $event)
    {
        //
    }
}
