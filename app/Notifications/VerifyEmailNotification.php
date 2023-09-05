<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Config;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class VerifyEmailNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.  
     */
    public function __construct()
    {
        //
    }

    // protected function verificationUrl($notifiable)
    // {
    //     $appUrl = config('app.url');
    //     $url = URL::temporarySignedRoute(
    //         'verification.verify',
    //         now()->addMinutes(Config::get('auth.verification.expire', 60)),
    //         [
    //             'id' => $notifiable->getKey(),
    //             'hash' => sha1($notifiable->getEmailForVerification())
    //         ]
    //     );

    //     return str_replace(url('/api'), $appUrl, $url);
    // }

    protected function verificationUrl($notifiable)
    {
        $appUrl = config('app.url');
        $expirationTime = now()->addMinutes(Config::get('auth.verification.expire', 1));
    
        if (Carbon::now()->gt($expirationTime)) { 
            // URL sudah kadaluwarsa, arahkan ke halaman expired
            return route('verification.expired');
        } 
    
        $url = URL::temporarySignedRoute(
            'verification.verify',
            $expirationTime,
            [
                'id' => $notifiable->getKey(),
                'hash' => sha1($notifiable->getEmailForVerification())
            ]
        );
    
        return str_replace(url('/api'), $appUrl, $url);
    }



    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
        ->subject('Verifikasi Email')
        ->line('Terima kasih telah mendaftar di situs kami!')
        ->line('Silakan klik tombol di bawah ini untuk memverifikasi alamat email Anda.')
        ->action('Verifikasi Email', $this->verificationUrl($notifiable))
        ->line('Jika Anda tidak mendaftar di situs kami, Anda bisa mengabaikan email ini, Link akan kadaluarsa dalam 5 menit.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
