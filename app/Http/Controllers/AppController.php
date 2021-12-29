<?php

namespace App\Http\Controllers;

use App\Chatroom;
use App\Emoji;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    public function index()
    {
        $data = ['user' => Auth::user(), 'rooms' => Chatroom::all(), 'emojis' => Emoji::all()];
        return view('app', ['data' => $data]);
    }
}
