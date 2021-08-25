<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UpdatePasswordController extends Controller
{
    public function edit()
    {
        return view('password.index');
    }

    public function update(Request $request)
    {
        // dd('berhasil');
        $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'min:6', 'confirmed'],
        ]);

        // Mengecek password sebelumnya atau current password benar atau tidak
        if(Hash::check($request->current_password, Auth::user()->password)) {
            Auth::user()->update(['password' => Hash::make($request->password)]);
            return redirect('/timeline')->with('message', 'Your password has been updated');
        }

        throw ValidationException::withMessages([
            'current_password' => 'Your current password does not macth with our record',
        ]);
    }
}
