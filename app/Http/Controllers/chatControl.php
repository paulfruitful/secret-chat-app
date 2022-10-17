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
        return view('home',['chats'=>Message::orderBy('created_at','asc')]);
    }
   


    public function sendMessage(Request $request)
{
  $user = auth()->user();

  $message = Message::create([
    'message'=>$request->message,
     'user_id'=>auth()->id()
  ]);


  return redirect('/home')->with(['status' => 'Message Sent!',
  'chats'=>Message::all()] );
}

}
