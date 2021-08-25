<?php

// Ini file untuk menyimpan codingan following yang ada di App\Models\User
namespace App\Traits;

use App\Models\User;

trait Following
    {
    public function following()
    {
        // Membuat relasi follow many to many
        // karna user bisa bnyak following dan si following juga bisa banyak following
        // syntax nya (belongsToMany)
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id')->withTimestamps();
    }

    // Action follow
    public function saveFollow(User $user)
    {
        return $this->following()->save($user);
    }

    // Action Unfollow
    public function unfollow(User $user)
    {
        return $this->following()->detach($user);
    }
    // Membuat relasi follower
    // sama dengan method following cuma fieldnya dibalek
    public function follower()
    {
        return $this->belongsToMany(User::class, 'follows', 'following_user_id', 'user_id')->withTimestamps();
    }

    // Membuat aksi follow and unfollow
    public function hasFollow(User $user)
    {
        return $this->following()->where('following_user_id', $user->id)->exists();
    }
    }

?>
