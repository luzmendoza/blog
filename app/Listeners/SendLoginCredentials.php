<?php

namespace App\Listeners;

use App\Events\UserWasCReated;
use App\Mail\LoginCredentials;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendLoginCredentials
{
    /**
     * Handle the event.
     *
     * @param  UserWasCReated  $event
     * @return void
     */
    public function handle(UserWasCReated $event)
    {
        //enviar email con las credenciales... se recomienda cambiar send a QUEUE
        Mail::to($event->user)->queue(
            //generar una instancia del email a enviar
            new LoginCredentials($event->user, $event->password)
        );
    }
}
