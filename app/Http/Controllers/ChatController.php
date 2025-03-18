<?php

namespace App\Http\Controllers;

use App\Models\User;

class ChatController extends Controller
{
    public function groupChat()
    {
        return view('dashboard', [
            'users' => User::all(),
        ]);
    }

    public function privateChat($id)
    {
        return view('dashboard', [
            'users' => User::all(),
            'selectedUserId' => $id,
        ]);
    }
}
