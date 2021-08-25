<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FindUserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('users.find', [
            // 'getUsers' => User::simplePaginate(16),
            'getUser' => User::paginate(16),
        ]);
    }

    public function search()
    {
        return request('cari');
    }
}
