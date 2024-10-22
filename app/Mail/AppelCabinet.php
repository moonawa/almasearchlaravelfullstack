<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AppelCabinet extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $entreprise;
    public $offre;
    /**
     * Create a new message instance.
     */
    public function __construct($entreprise, $offre)
    {
        $this->entreprise = $entreprise;
        $this->offre = $offre;
    }
    public function build()
    {
        sleep(2);
        return $this->subject('Appel aux Cabinets')
                    ->view('email.appelcabinet')
                    ->with([
                        'entreprise' => $this->entreprise,
                        'offre' => $this->offre,
                    ]);
    }
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Alma-Search: Appel aux Cabinets',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.appelcabinet',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
