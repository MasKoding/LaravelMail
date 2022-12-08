<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Attachment;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Subscribe extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $email;
    public $messageTo;

    public function __construct($email,$messageTo)
    {
        //
        $this->email =  $email;
        $this->messageTo = $messageTo;
        
    }

    public function build()
    {
        return $this
        ->subject('Thankyou for subscribing our news')
                ->markdown('emails.subscribers');
    }



    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Subscribe',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            markdown: 'emails.subscribers',
            with:[
                'url'=> 'http://laravel.com'
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [
            Attachment::fromPath(public_path().'/image/img-kopi1.png')
            ->as('Picture.png')
            ->withMime('application/png'),
            Attachment::fromPath(public_path().'/pdf/file1.pdf')
            ->as('File.pdf')
            ->withMime('application/pdf')
   
            //  masdidi00@gmail.com

          
            
        ];
    }
}
