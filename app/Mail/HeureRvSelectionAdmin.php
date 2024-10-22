<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class HeureRvSelectionAdmin extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $entreprise;
    public $date;
    public $offre;
    public $candidat;
    /**
     * Create a new message instance.
     */
    public function __construct($entreprise, $offre, $date, $candidat)
    {
        $this->entreprise = $entreprise;
        $this->date = $date;
        $this->offre = $offre;
        $this->candidat = $candidat;
    }
    public function build()
    {
        sleep(2);
        return $this->subject('Date fixée pour un rendez-vous')
                    ->view('email.heurervselectionadmin')
                    ->with([
                        'entreprise' => $this->entreprise,
                        'date' => $this->date,
                        'offre' => $this->offre  ,
                        'candidat' => $this->candidat    
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
            view: 'email.heurervselectionadmin',
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
