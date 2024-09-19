<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Queue\SerializesModels;

class FamilyAddedToEvent extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $event,$addeduser,$user;

    public function __construct($event,$addeduser)
    {
        $this->event=$event;
        $this->addeduser=$addeduser;
        $this->user = auth()->user();
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('hello@samepagepa.com', 'SamepagePA'),
            replyTo: [
                new Address('hello@samepagepa.com', 'SamepagePA'),
            ],
            subject: $this->user->first_name.' added you to an event on Same Page',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        

        return new Content(
            view: 'mails.familyaddedtoevent',
            with:[
                'addeduser'=>$this->addeduser,
                'event'=>$this->event,
                'user'=>$this->user,
            ]
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
