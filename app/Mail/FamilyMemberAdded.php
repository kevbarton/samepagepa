<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Queue\SerializesModels;

class FamilyMemberAdded extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $name,$email,$user,$code;

    public function __construct($name,$email,$code)
    {
        $this->name=$name;
        $this->email=$email;
        $this->code=$code;
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
            subject: $this->user->first_name.' has sent you family invite to Same Page',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        

        return new Content(
            view: 'mails.familyinvite',
            with:[
                'name'=>$this->name,
                'email'=>$this->email,
                'code'=>$this->code,
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
