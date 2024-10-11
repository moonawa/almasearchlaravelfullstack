<?php

namespace App\Notifications;

use App\Models\Candidature;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReponseEseVipAdmin extends Notification
{
    use Queueable;
    public $candidature; 
    public $offre;
    public $entreprise;
    public $reponese;
    
    /**
     * Create a new notification instance.
     */
    public function __construct(Candidature $candidature)
    {
        $this->candidature = $candidature;
        $this->offre = $candidature->offre;
        $this->entreprise = $candidature->offre->entreprise;
        $this->reponese = $candidature->reponese;
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
            'reponese' =>$this->reponese,
            'entreprise' => $this->entreprise->nomentreprise,
            'message' => "L'entreprise '{$this->entreprise->nomentreprise}' a   {$this->reponese}' un candidat à l offre '{$this->offre->nomposte}';"
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
