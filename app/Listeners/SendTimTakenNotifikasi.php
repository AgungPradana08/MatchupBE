<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendTimTakenNotifikasi
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle($event)
    {
        $tim = $event->tim;
        $timtaker = $event->timtaker;

        $timCreator = $tim->user; // Pembuat tim

        $notificationMessage = "Seseorang telah bergabung dengan Tim Anda!";

        // Kirim notifikasi ke pembuat sparring
        $timCreator->notify(new SendTimTakenNotifikasi($notificationMessage));
    }
}
