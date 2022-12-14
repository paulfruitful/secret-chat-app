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
        return view('home',['chats'=>Message::all()]);
    }
   


    public function sendMessage(Request $request)
{
  $user = auth()->user();

   Message::create([
    'message'=>$request->message,
     'user_id'=>auth()->id()
  ]);


  return redirect('/home')->with(['status' => 'Message Sent!'] );
}

}
