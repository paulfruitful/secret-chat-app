<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Message;
use Illuminate\Http\Request;

class chatControl extends Controller
{
    //
    public function index(){
        return view('chats',['chats'=>auth()->user()->chat->latest()]);
    }
    public function show(Chat $chat){
        return view('chat',['chats'=>$chat->message]);
    }

}
