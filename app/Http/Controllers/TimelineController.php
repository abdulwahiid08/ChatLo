<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimelineController extends Controller
{
    public function __invoke()
    {
        // Mengambil data dari User model dengan method timeline
        // $statuses = Auth::user()->timeline();

        $following = Auth::user()->following->pluck('id');

        $statuses = Status::whereIn('user_id', $following)
                                ->orWhere('user_id', Auth::user()->id)
                                ->latest()
                                ->get();

        return view('timeline', ['getStatus' => $statuses]);
    }
}
