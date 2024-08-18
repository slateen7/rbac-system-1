<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    public function create(User $user)
    {
        return in_array($user->role->name, ['Admin', 'Editor']);
    }

    public function update(User $user, Post $post)
    {
        return in_array($user->role->name, ['Admin', 'Editor']);
    }

    public function delete(User $user, Post $post)
    {
        return $user->role->name === 'Admin';
    }
}
