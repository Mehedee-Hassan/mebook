@extends('layouts.master')


@section('content')
    <section class="row new-post">
{{--        @include('includes.message-block')--}}

        {{--<div class="col-md-6 col-md-offset-3">--}}
            <div class="pull-left panel chatbox-size custom-panel">

                <div class="panel-heading">
                    <h3 class="panel-title">Friends</h3>
                </div>

                <div class="panel-body">

                    @foreach($users as $user)

                    <div id="chat-name-list-element" class="chat-name-list-element"
                         data-link="{{ route('user.message') }}"
                         data-useridto="{{ $user->id }}"
                         data-token="{{ csrf_token() }}"
                            >

                        <h3 class="panel-title">{{$user->name}}</h3>
                    </div>
                    @endforeach

                </div>

            </div>

            <div class="pull-left panel chatbox-size custom-panel" id="custom-panel">
                <div class="panel-heading">

                    <h3 class="panel-title to-user-name-title">
                        {{ Auth::user()->name }}
                    </h3>
                </div>
                <div class="panel-body" id="message-list-box">

                    <div id="chat-messages-list">


                    </div>




                </div>

                <div class="type-message">
                    <textarea rows="1" id="type-message-box" class="pull-left"
                              data-link="{{ route('user.message.send') }}"
                              data-useridfrom="{{ Auth::user()->id }}"
                              data-token="{{ csrf_token() }}"></textarea>



                    {{--<button class="button1 pull-right" id="message-send-button"--}}
                            {{--data-link="{{ route('user.message.send') }}"--}}
                            {{--data-useridto="{{ Auth::user()->id }}"--}}
                            {{--data-token="{{ csrf_token() }}">--}}
                        {{--Send--}}
                    {{--</button>--}}
                </div>

            </div>


        {{--</div>--}}

    </section>






    <script>
        var URL = '{{ route('post.update') }}';
        var token = '{{ \Illuminate\Support\Facades\Session::token() }}' ;
        var _fromuserid = '{{ Auth::user()->id }}'

    </script>

@endsection




@section('js-without-tag')
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.3/socket.io.js"></script>--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--}}

    <script>

        var socket = io.connect('http://localhost:3000/');


        socket.on('test-channel:ChatBox', function(data) {

            console.log('channel '+data.message);
            console.log(data.user);
            console.log(_fromuserid);
            var id = $('#type-message-box').attr('data-useridfrom');

            if(data.user == _fromuserid) {
                $("#chat-messages-list").append("<div class='speech-bubble-1'><section>" + data.message + "</section></div>");
                console.log("blue");

            }
            else {
                $("#chat-messages-list").append("<div class='speech-bubble-2'><section>" + data.message + "</section></div>");
                console.log("red");

            }

        });


    </script>

@endsection








