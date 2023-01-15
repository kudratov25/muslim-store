<?php

namespace App\Mail;

use App\Models\Blog;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;
use Illuminate\Mail\Mailables\Address;

class BlogCreated extends Mailable
{
    use Queueable, SerializesModels;


     /**
     * The blog instance.
     *
     * @var \App\Models\Blog
     */
    public $blog;
    public $request;



    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Blog $blog, $request)
    {
        $this->blog = $blog;
        $this->request = $request;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            from: new Address('info@muslim-store.uz', 'info@muslim-store.uz'),
            subject: $this->request->title,
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
            markdown: 'email.index',
            with: [
                'url' => URL::current().'/'.$this->blog->id,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
