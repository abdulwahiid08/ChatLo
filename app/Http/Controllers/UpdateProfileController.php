<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UpdateProfileController extends Controller
{
    public function edit()
    {
        return view('users.edit');
    }

    public function update(Request $request)
    {
        $attr = $request->validate([
            'name' => 'string|required',
            'username' => 'alpha_num|required|unique:users,username,' . auth()->id(),
            'email' => 'email|string|required'
        ]);

        auth()->user()->update($attr);

        return redirect()
                ->route('profile', auth()->user()->username)
                ->with('message', 'Your profile has been updated');
    }
}
