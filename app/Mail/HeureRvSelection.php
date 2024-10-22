<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class HeureRvSelection extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $entreprise;
    public $date;
    public $offre;
    public $lieu;
    /**
     * Create a new message instance.
     */
    public function __construct($entreprise, $offre, $date)
    {
        $this->entreprise = $entreprise;
        $this->date = $date;
        $this->offre = $offre;
        $this->lieu = $offre->lieu;

        
    }
    public function build()
    {
        sleep(2);
        return $this->subject('Date fixée pour un rendez-vous')
                    ->view('email.heurervselection')
                    ->with([
                        'entreprise' => $this->entreprise,
                        'date' => $this->date,
                        'lieu' => $this->lieu,
                        'offre' => $this->offre    
                    ])
                    ;
    }
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Alma-Search: Date fixée pour un rendez-vous',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.heurervselection',
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
