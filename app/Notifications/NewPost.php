<?php

namespace App\Notifications;

use App\Post;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewPost extends Notification implements ShouldQueue
{
    use Queueable;
    public $following;
    public $post;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $following, Post $post)
    {
        $this->following = $following;
        $this->post = $post;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }

    /**
     * Get the database representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */

    public function toDatabase($notifiable)
    {
        return [
            'following_id' => $this->following->id,
            'following_name' => $this->following->name,
            'post_id' => $this->post->id,
            'post_title' => $this->post->title,
            'post_image' => $this->post->featured,
            'post_author' => $this->post->profile->name,
            'post_author_avatar' => $this->post->profile->image
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
  
    //...
    public function toArray($notifiable)
    {
        return [
            'id' => $this->id,
            'read_at' => null,
            'data' => [
                'following_id' => $this->following->id,
                'following_name' => $this->following->name,
                'post_id' => $this->post->id,
                'post_title' => $this->post->title,
                'post_image' => $this->post->featured,
                'post_author' => $this->post->profile->name,
                'post_author_avatar' => $this->post->profile->image
            ],
        ];
    }
}

