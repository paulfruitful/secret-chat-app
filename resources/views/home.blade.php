@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body" id="n">
                    @if (session('status'))
                        <div class="alert alert-success" id="m"role="alert">
                            {{ session('status') }}
                        </div>
                        <script>
                             setTimeout(() => {
                                const mess=document.getElementById("m")
                                mess.style.display="none"

                             }, 2000);
                        </script>           
            @endif

                </div>
            </div>
            <p class="fs-2 fw-bold text-center">Chats</p>
            <ul class="list-group">
                @forelse ($chats as $chat)
                @if (auth()->id()==$chat->user->id)
                     <li class="list-group-item text-bg-dark m-3"><span class="text-warning">Me</span><br>{{$chat->message}}</li>
                
                @else
                    <li class="list-group-item m-3"><span class="text-primary">{{$chat->user->name}}</span><br>{{$chat->message}}</li>
                
               @endif
                    
                @empty
                    
                <li class="list-group-item text-bg-primary p-3">No Chats Yet</li>
                @endforelse
              </ul>

            <div class="bottom">
            <div class="mb-3">
                <form action="/send" method="post">
                    
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
