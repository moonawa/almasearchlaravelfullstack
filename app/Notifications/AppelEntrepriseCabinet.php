<?php

namespace App\Notifications;

use App\Models\Offre;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AppelEntrepriseCabinet extends Notification
{
    use Queueable;
    public $offre;
    public $entreprise;
    /**
     * Create a new notification instance.
     */
    public function __construct($entreprise, $offre)
    {
        $this->offre = $offre;
        $this->entreprise = $entreprise;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }
    public function toDatabase($notifiable){
        return [
            'offre' => $this->offre->nomposte,
            'entreprise' => $this->entreprise->nomentreprise,
            'message' => "Lentreprise '{$this->entreprise->nomentreprise}' Vient de faire appel aux cabinets pour loffre '{$this->offre->nomposte}';"
        ];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
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
