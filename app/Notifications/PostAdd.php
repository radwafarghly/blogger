<?php

namespace App\Notifications;

use App\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class PostAdd extends Notification implements ShouldBroadcast ,ShouldQueue ,ShouldBroadcastNow
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public  $post;
    public function __construct(Post $post)
    {
          $this->post =$post;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['broadcast','database'];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'post' => "New Post Add with title::" . $this->post->title,
            'user' => "Added By " . auth()->user()->name
        ]);
    }

    public function toDatabase($notifiable)
    {
        return [
            //'data' =>"New Post Add with title :: " . $this->post->title ." <br> Added By " . auth()->user()->name
            'post' => "New Post Add with title::" . $this->post->title,
            'user' => "Added By " . auth()->user()->name
        ];
    }
}
