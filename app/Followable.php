<?php
/**
 * Created by PhpStorm.
 * User: suman
 * Date: 5/2/2020
 * Time: 5:01 PM
 */

namespace App;


trait Followable
{

    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id');
    }

    public function follow(User $user)
    {
        return $this->follows()->save($user);
    }

    public function following(User $user)
    {
        return $this->follows()->where('following_user_id', $user->id)->exists();
    }

    public function unfollow(User $user)
    {
        return $this->follows()->detach($user);
    }

    public function toggleFollow(User $user)
    {
        return $this->follows()->toggle($user);
    }
}