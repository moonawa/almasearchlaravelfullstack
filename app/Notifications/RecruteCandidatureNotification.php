<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RecruteCandidatureNotification extends Notification implements ShouldQueue
{
    use Queueable;
    protected $user;

    /**
     * Create a new notification instance.
     */
    public function __construct(User $user)
    {
        $this->user = $user;
        //
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
        sleep(2);
        return (new MailMessage)
        ->subject('Status Recrutement entreprise')
        ->greeting(__('Bonjour!'))
        ->line('Le status de recrutement a changé .')
        ->salutation('Cordialement');
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

    public function toDatabase($notifiable)
    {
        return [
            'message' => 'Un nouvel utilisateur a été créé : ' . $this->user->name,
            'user_id' => $this->user->id, // Vous pouvez utiliser ces détails pour afficher des informations supplémentaires dans le tableau de bord de l'administrateur
        ];
    }
}
