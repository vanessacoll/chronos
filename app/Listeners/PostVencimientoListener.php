<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Models\User;
use App\Notifications\PostVencimientoNotification;

class PostVencimientoListener
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
         User::where('id_cuenta', Auth::user()->id_cuenta)->get()
        ->each(function(User $user) use($event){
            Notification::send($user, new PostVencimientoNotification($event->licencia));
        });
    }
}
