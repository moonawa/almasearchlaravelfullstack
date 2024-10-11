<?php

namespace App\Notifications;

use App\Models\Proposition;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PropositionCabinetAdmin extends Notification
{
    use Queueable;
    public $proposition;
    public $offre;
    public $entreprise;
    public $cabinet;
    /**
     * Create a new notification instance.
     */
    public function __construct(Proposition $proposition)
    {
        $this->proposition = $proposition;
        $this->offre = $proposition->offre;
        $this->entreprise = $proposition->offre->entreprise;
        $this->cabinet = $proposition->candidat->cabinet;
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
            'offre' => $this->offre->nomposte,
           'entreprise' => $this->entreprise->nomentreprise,
            'cabinet' => $this->cabinet->nomcabinet,
            
            'message' => "Le cabinet '{$this->cabinet->nomcabinet}'  a proposé un candidat  à loffre '{$this->offre->nomposte}' de lentreprise '{$this->entreprise->nomentreprise}';"
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