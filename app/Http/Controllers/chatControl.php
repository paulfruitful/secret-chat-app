<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Message;
use Illuminate\Http\Request;

class chatControl extends Controller
{
    //
    public function index(){
        return view('chats',['chats'=>Chat::latest()]);
    }
    public function show(Chat $chat){
        
    }

}
