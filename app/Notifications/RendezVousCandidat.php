<?php

namespace App\Notifications;

use App\Models\Candidature;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RendezVousCandidat extends Notification
{
    use Queueable;
public $candidature;
public $offre;
public $date;
public $lieu;
    /**
     * Create a new notification instance.
     */
    public function __construct(Candidature $candidature)
    {
        $this->candidature = $candidature;
        $this->offre = $candidature->offre;
        $this->date = $candidature->heurecandidature;
        $this->lieu = $candidature->lieu;
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
            'date' => $this->date,
            'lieu' => $this->lieu,
            'message' => "Vous avez été pré-sélectionné à l'offre '{$this->offre->nomposte}'; rendez-vous: {$this->date} à {$this->lieu} "
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
