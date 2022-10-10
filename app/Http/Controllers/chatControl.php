<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Message;
use App\Events\Messagesent;
use Illuminate\Http\Request;

class chatControl extends Controller
{
    //
    public function index(){
        return view('chats',['chats'=>auth()->user()->chat->latest()]);
    }
    public function show(Chat $chat){
        return view('chat',['chats'=>$chat->message->all()]);
    }

    public function create(){
        $chat=Chat::create([
          'user_id'=>auth()->id()
        ]);


    }



    public function sendMessage(Request $request)
{
  $user = auth()->user();

  $message = $user->message->create([
    'message' => $request->input('message')
  ]);

  broadcast(new Messagesent($user, $message))->toOthers();

  return ['status' => 'Message Sent!'];
}

}
