<?php

namespace App\Listeners;

use App\Events\PruebaPushEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PruebaPushListener
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
     * @param  \App\Events\PruebaPushEvent  $event
     * @return void
     */
    public function handle(PruebaPushEvent $event)
    {
        //
    }
}
