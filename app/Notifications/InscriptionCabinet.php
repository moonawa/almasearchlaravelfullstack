<?php

namespace App\Notifications;

use App\Models\Cabinet;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InscriptionCabinet extends Notification
{
    use Queueable;
    protected $cabinet;

    /**
     * Create a new notification instance.
     */
    public function __construct(Cabinet $cabinet)
    {
        $this->cabinet = $cabinet;
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
            'cabinet_id' => $this->cabinet->id,
            'nomcabinet' => $this->cabinet->nomcabinet,
            'descabinet' => $this->cabinet->descabinet,
            'message' => "Le cabinet  '{$this->cabinet->nomcabinet}' vient de s\' inscrire."
        ];
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
