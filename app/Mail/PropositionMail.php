<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PropositionMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $cabinet;
    public $offre;
    /**
     * Create a new message instance.
     */
    public function __construct($cabinet, $offre)
    {
        $this->cabinet = $cabinet;
        $this->offre = $offre;
        
    }
    public function build()
    {
        sleep(2);
        return $this->subject('Proposition d\'un candidat à l\' offre: '.$this->offre->nomposte)
                    ->view('email.propositionmail')
                    ->with([
                        'cabinet' => $this->cabinet,
                        'offre' => $this->offre  ,
                    ])
                    ;
    }
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Proposition d\'un candidat à l\' offre: '.$this->offre->nomposte
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.propositionmail',
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
