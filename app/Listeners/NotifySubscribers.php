<?php

namespace App\Listeners;

use App\Events\ThreadCreate;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifySubscribers
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
     * @param  ThreadCreate  $event
     * @return void
     */
    public function handle(ThreadCreate $event)
    {
        var_dump($event->thread['name'] . ' was published on the forum.');
    }
}
