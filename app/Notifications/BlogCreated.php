<?php

namespace App\Notifications;

use App\Models\Blog;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BlogCreated extends Notification
{
    use Queueable;

    public $blog;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Blog $blog)
    {
        $this->blog=$blog;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
           'id'=> $this->blog->id,
           'title'=> $this->blog->title,
           'image'=> $this->blog->image,
           'created_at'=> $this->blog->created_at,
           
        ];
    }
}
