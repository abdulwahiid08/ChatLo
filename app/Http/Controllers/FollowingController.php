<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowingController extends Controller
{
    public function following(User $user)
    {
        return view('users.following', [
            'following' => $user->following,
            'getUser' => $user
        ]);
    }

    public function follower(User $user)
    {
        return view('users.following', [
            'following' => $user->follower,
            'getUser' => $user
        ]);
    }

    public function store(Request $request, User $user)
    {
        // Jika user sudah follow, tampilakn unfollow, tpi jika belum follow maka tampilkan follow
        if(Auth::user()->hasFollow($user)) {

            Auth::user()->unfollow($user);

        } else{

            Auth::user()->saveFollow($user);

        }

        return back()->with('succes', 'You are follow the user');
    }
}
