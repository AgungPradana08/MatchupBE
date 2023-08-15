<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendSparringTakenNotifikasi
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
        $sparring = $event->sparring;
        $taker = $event->taker;

        $sparringCreator = $sparring->user; // Pembuat sparring

        $notificationMessage = "Sparring yang Anda buat telah diambil oleh seseorang.";

        // Kirim notifikasi ke pembuat sparring
        $sparringCreator->notify(new SendSparringTakenNotifikasi($notificationMessage));
    }
}
