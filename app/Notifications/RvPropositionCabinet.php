<?php

namespace App\Notifications;

use App\Models\Proposition;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RvPropositionCabinet extends Notification
{
    use Queueable;
    public $proposition;
    public $offre;
    public $entreprise;
    /**
     * Create a new notification instance.
     */
    public function __construct(Proposition $proposition)
    {
        $this->proposition = $proposition;
        $this->offre = $proposition->offre;
        $this->entreprise = $proposition->offre->entreprise;
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

    public function toDatabase($notifiable)
    {
        return [
            'proposition' => $this->proposition,
            'offre' => $this->offre,
            'entreprise' => $this->entreprise,
            'message' => 'Lentreprise '.$this->entreprise->nomentreprise.' a donné un rendez-vous à un candidat à loffre '.$this->offre->nomposte.' '
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
