@extends('layouts.app')

@section('content')

<ul class="list-group">
    @forelse ($chats as $chat)
    <nav class="navbar bg-light">
        <div class="container-fluid">
          <a class="navbar-brand">Navbar</a>
        </div>
      </nav>
    @empty
    <nav class="navbar bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar</a>
        </div>
      </nav>
    @endforelse
  </ul>

<div class="fixed-bottom">
<div class="mb-3">
    <form action="/send" method="post">
        @csrf
    <label for="exampleFormControlTextarea1" class="form-label"></label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="message" rows="3" placeholder="Send A New Message {{auth()->user()->name}}"></textarea>
    <button type="submit" class="btn btn-primary">Send <i></i></button>      
</form>
  </div>
</div>


@endsection