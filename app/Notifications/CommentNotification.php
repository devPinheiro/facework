<?php

namespace Guava\Communication\Notifications;

use App\Models\Comment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;

class NewComment extends Notification implements ShouldQueue
{
    use Queueable;    
    /** @var Comment */
    private $comment;

    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }
    public function via($notifiable) 
    {
         return ['database', 'broadcast'];
    }
    public function toArray($notifiable)
    {
         return [
            'post' => [
                'id' => $this->comment->post_id,
            ],
            'author' => [
                'id' => $this->comment->user_id,
                'first_name' => $this->comment->user->first_name,
                'last_name' => $this->comment->user->last_name,
            ],
            'comment' => [
                'id' => $this->comment->id,
                'body' => $this->comment->body,
                'commented_at' => $this->comment->commented_at,
            ],
        ];
     }
    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage($this->toArray($notifiable));
    }
    public function broadcastType()
    {
        return 'new-comment';
    }

}