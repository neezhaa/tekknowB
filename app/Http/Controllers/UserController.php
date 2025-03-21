<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard()
    {
        $users = User::whereNot('id', Auth::user()->id)->get();
        return view('dashboard', compact('users'));
    }

    public function chatUser($userId)
    {
        return view('userChat', compact('userId'));
    }
}
