<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendMabarTakenNotifikasi
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
        $mabar = $event->mabar;
        $taker = $event->taker;

        $mabarCreator = $mabar->user; // Pembuat mabar

        $notificationMessage = "Seseorang telah join ke dalam Mabar Anda!";

        // Kirim notifikasi ke pembuat mabar
        $mabarCreator->notify(new SendMabarTakenNotifikasi($notificationMessage));
    }
}
