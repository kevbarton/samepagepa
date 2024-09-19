<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Queue\SerializesModels;

class ContactRequestSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $subject, $name,$email,$message;

    public function __construct($subject, $name,$email,$message)
    {
        $this->subject=$subject;
        $this->name=$name;
        $this->email=$email;
        $this->message=$message;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('hello@samepagepa.com', 'SamepagePA'),
            replyTo: [
                new Address('taylor@example.com', 'Taylor Otwell'),
            ],
            subject: 'Same Page - Contact Request Received',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mails.contact',
            with:[
                'subject'=>$this->subject,
                'name'=>$this->name,
                'email'=>$this->email,
                'contactmessage'=>$this->message
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
