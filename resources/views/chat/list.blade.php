@extends('layouts.app')


@section('content')

    @if(count($conversations)>0)
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <ul class="list-group">
                    @foreach($conversations as $c)
                        <a href="?conversation_id={{$c->id}}">
                            <li class="list-group-item {{$c->id == ($conversation->id??-1)?'bg-success text-white':''}}">
                                {{$c->conversation->participants()->where('messageable_id','!=', auth()->id())->first()->messageable->name??""}}
                                <br>
                                <span class="text-sm">{{$c->conversation->last_message?$c->conversation->last_message->body:""}}</span>
                            </li>
                        </a>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-8 p-2" style="background-color: #e9eae9; ">
                @if($conversation)
                    <ul id="list" style="height: 70vh; overflow: auto;" class="list-group">
                    @foreach($messages as $message)

                        @if($message->is_sender)
                                <div class="d-flex flex-row justify-content-end mb-4">
                                    <div class="p-3 me-3 border" style="border-radius: 15px; background-color: #0b9d2e;">
                                        <p class="small mb-0 text-white">{{$message->body}}</p>
                                    </div>
                                    <img src="{{$message->sender->image ?? asset('images/ball.png')}}" alt="avatar 1"
                                         style="width: 45px; height: 100%; object-fit: contain">
                                    <p class="small ms-3 mb-3 rounded-3 text-muted">{{$message->created_at->diffForHumans()}}</p>
                                </div>
                            @else
                                <div class="d-flex flex-row justify-content-start mb-4">
                                    <img src="{{$message->sender->image ?? asset('images/ball.png')}}" alt="avatar 1"
                                         style="width: 45px; height: 100%; object-fit: contain">
                                    <div class="p-3 ms-3" style="border-radius: 15px; background-color: rgb(225,225,225);">
                                        <p class="small mb-0">{{$message->body}}</p>
                                    </div>
                                    <p class="small ms-3 mb-3 rounded-3 text-muted">{{$message->created_at->diffForHumans()}}</p>
                                </div>

                            @endif

                    @endforeach
                    </ul>
                    <div class="container my-4">
                        <form id="form" action="{{route('chat.send', $conversation->id)}}" class="form-inline my-2 my-lg-0">
                            @csrf
                            <div class="row">
                                <input id="message" name="message" class="form-control col mr-sm-2" type="search"
                                       placeholder="Enter your message" aria-label="Search">
                                <button id="button" class="btn btn-outline-success my-2 my-sm-0 col-auto" type="button">Send
                                </button>
                            </div>
                        </form>
                    </div>
                @else
                    Please click the conversation to continue
                @endif

            </div>
        </div>
    </div>
    @else
        <div class="container">
            No conversations yet!
        </div>
    @endif
@stop

@push('js')
    <script>
        $("#message").val('')
        // Retrieve the input field
        const inputField = document.getElementById('message');
        const submitButton = document.getElementById('button');
        // Check if localStorage has a value for 'myInput' key
        if (localStorage.getItem('message')) {
            // If a value is found, set the input field's value to the stored value
            inputField.value = localStorage.getItem('message');
        }

        // Add event listener for input changes
        inputField.addEventListener('input', function() {
            // Save the input value to localStorage
            localStorage.setItem('message', inputField.value);
        });

        inputField.addEventListener('keypress', function(event) {
            // Check if the Enter key was pressed (key code 13)
            if (event.keyCode === 13) {
                event.preventDefault(); // Prevent the default form submission
                localStorage.setItem('message', '');
                $("#form").submit();
                $("#message").val('')
            }
        });

        submitButton.addEventListener('click', function() {
            localStorage.setItem('message', '');
            $("#form").submit();
            $("#message").val('')
        });
        // Function to refresh the page
        function refreshPage() {
            location.reload();
        }

        // Set timer to refresh the page every 60 seconds
        setTimeout(refreshPage, 10000*6);

        var objDiv = document.getElementById("list");
        objDiv.scrollTop = objDiv.scrollHeight;
    </script>
@endpush
