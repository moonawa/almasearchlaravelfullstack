<?php

namespace App\Notifications;

use App\Models\Entreprise;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InscriptionEntreprise extends Notification
{
    use Queueable;
    protected $entreprise;
    /**
     * Create a new notification instance.
     */
    public function __construct(Entreprise $entreprise)
    {
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
/**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'entreprise_id' => $this->entreprise->id,
            'nomentreprise' => $this->entreprise->nomentreprise,
            'des' => $this->entreprise->des,
            'message' => "L\' entreprise '{$this->entreprise->nomentreprise}' vient de s\' inscrire."
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
