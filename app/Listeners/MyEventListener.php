<?php

namespace App\Listeners;

use App\Events\MyEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Session;

class MyEventListener
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
     * @param  MyEvent  $event
     * @return void
     */
    public function handle(MyEvent $event)
    {
        Session::flash('status','No problem');
    }
}
