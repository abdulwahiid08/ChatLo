<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Membuat relasi status ONE to MANY
    // karena satu user bisa memiliki bnyak status
    // function nya yaitu hasMany(Kelas model yang dituju)
    public function statuses()
    {
        return $this->hasMany(Status::class);
    }

    public function makeStatus($string)
    {
        $this->statuses()->create([
            'body' => $string,
            'identifier' => Str::slug(Str::random(32) . $this->id)
        ]);
    }

    // Image profil
    public function gravatar($size = 100)
    {
        $default = 'mm';
        return "https://www.gravatar.com/avatar/" . md5(strtolower(trim($this->email))) . "?d=" . urlencode($default) . "&s=" . $size;
    }

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






    //public function timeline()
    // {
    //     // Menampilkan Status user dan status yang difollow
    //     // $following = Auth::user()->following->pluck('id');
    //     $following = $this->following->pluck('id');

    //     // $statuses = Status::whereIn('user_id', $following)
    //     //                         ->orWhere('user_id', Auth::user()->id)
    //     //                         ->latest()
    //     //                         ->get();
    //     return Status::whereIn('user_id', $following)
    //                         ->orWhere('user_id', $this->id)
    //                         ->latest()
    //                         ->get();
    // }
