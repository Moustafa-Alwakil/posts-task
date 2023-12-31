<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;

class PostPolicy
{
    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Post $post): bool
    {
        return (int)$post->user_id === (int)$user->id;
    }

    public function delete(User $user, Post $post): bool
    {
        return (int)$post->user_id === (int)$user->id;
    }
}
