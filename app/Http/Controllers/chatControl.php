<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class chatControl extends Controller
{
    //
    public function index(){
        return view('chats');
    }
}
