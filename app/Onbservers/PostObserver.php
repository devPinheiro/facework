<?php

namespace App\Observers;

use App\Notifications\NewPost;
use App\Post;

class PostObserver
{
    public function created(Post $post)
    {
        $user = $post->user;
        foreach ($user->followers as $follower) {
            $follower->notify(new NewPost($user, $post));
        }
    }
}