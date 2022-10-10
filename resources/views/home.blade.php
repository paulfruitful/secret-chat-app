@extends('layouts.app')

@section('content')
<script src="{{ mix('js/app.js')  }}"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
            <p class="fs-2 fw-bold text-center">Chats</p>
            <ul class="list-group">
                @forelse ($chats as $chat)
                @if (auth()->id()==$chat->user->id)
                    
                <li class="list-group-item">{{$chat->message}}</li>
                @else
                    
                <li class="list-group-item text-bg-primary p-3"><br>{{$chat->message}}</li>
                @endif
                    
                @empty
                    
                <li class="list-group-item text-bg-primary p-3">No Chats Yet</li>
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
        </div>
    </div>
</div>
@endsection
