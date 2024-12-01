<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RegisterMail extends Mailable
{
    use Queueable, SerializesModels;
    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    // public function build (){
    //     return $this->markdown('emails.forgot_password')->subject(config('app.name') . 'Forgot Password');
    // }

   
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Email Validation',
        );
    }

  
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.register',
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
