@extends('layouts.master')

@section('content')

<ul id="name">
    <li></li>
</ul>





@endsection




@section('js-without-tag')
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.3/socket.io.js"></script>--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--}}

    <script>

        var socket = io.connect('http://localhost:3000/');

        //    socket.on('connect',function(){
        //        socket.emit('message', 'Hello server');
        //    });






//       $('body').ready(function(){

        socket.on('test-channel:ChatBox', function(data) {

            console.log('channel '+data.message);

            $('#name').append('<li>'+data.message+"</li>");
        });
//        });


    </script>

@endsection









{{--<!DOCTYPE html>--}}
{{--<html>--}}
{{--<head>--}}
    {{--<title>Talking with Pusher</title>--}}
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">--}}
{{--</head>--}}
{{--<body>--}}
{{--<div class="container">--}}
    {{--<div class="content">--}}
        {{--<h1>Laravel 5 and Pusher is fun!</h1>--}}
        {{--<ul id="messages" class="list-group">--}}
        {{--</ul>--}}
    {{--</div>--}}
    {{--<div id="thisisthediv">asdflkasjdlfjalksjdf </div>--}}
{{--</div>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>--}}
{{--<script src="https://js.pusher.com/3.1/pusher.min.js"></script>--}}
{{--<script>--}}

    {{--$("#thisisthediv").on('click',function(){--}}
        {{--alert('yes');--}}
    {{--});--}}

    {{--//instantiate a Pusher object with our Credential's key--}}
    {{--var pusher = new Pusher('744089ef5e0427c24efa', {--}}
        {{--cluster: 'ap2',--}}
        {{--encrypted: true--}}
    {{--});--}}

    {{--//Subscribe to the channel we specified in our Laravel Event--}}
    {{--var channel = pusher.subscribe('channel-chat-box');--}}

    {{--//Bind a function to a Event (the full Laravel class)--}}
    {{--channel.bind('App\\Events\\ChatBox', addMessage);--}}

    {{--function addMessage(data) {--}}
        {{--var listItem = $("<li class='list-group-item'></li>");--}}
        {{--listItem.html(data.message);--}}
        {{--$('#messages').prepend(listItem);--}}
    {{--}--}}
{{--</script>--}}
{{--</body>--}}
{{--</html>--}}


{{--@extends('layouts.master')--}}

{{--@section('content')--}}
    {{--<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>--}}
    {{--<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>--}}
    {{--<script src="https://cdn.socket.io/socket.io-1.3.4.js"></script>--}}
    {{--<style type="text/css">--}}
        {{--#messages{--}}
            {{--border: 1px solid black;--}}
            {{--height: 300px;--}}
            {{--margin-bottom: 8px;--}}
            {{--overflow: scroll;--}}
            {{--padding: 5px;--}}
        {{--}--}}
    {{--</style>--}}
    {{--<div class="container spark-screen">--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-10 col-md-offset-1">--}}
                {{--<div class="panel panel-default">--}}
                    {{--<div class="panel-heading">Chat Message Module</div>--}}
                    {{--<div class="panel-body">--}}

                        {{--<div class="row">--}}
                            {{--<div class="col-lg-8" >--}}
                                {{--<div id="messages" ></div>--}}
                            {{--</div>--}}
                            {{--<div class="col-lg-8" >--}}
                                {{--<form action="{{ route('sendmessage2') }}" method="POST">--}}
                                    {{--<input type="hidden" name="_token" value="{{ csrf_token() }}" >--}}
                                    {{--<input type="hidden" name="user" value="{{ Auth::user()->name }}" >--}}
                                    {{--<textarea class="form-control msg"></textarea>--}}
                                    {{--<br/>--}}
                                    {{--<input type="button" value="Send" class="btn btn-success send-msg">--}}
                                {{--</form>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--@section('script')--}}
    {{--var socket = io.connect('http://localhost:3000/');--}}

    {{--socket.on('message', function (data) {--}}

    {{--data = jQuery.parseJSON(data);--}}
    {{--console.log(data.message);--}}
    {{--console.log("returned");--}}
    {{--$( "#messages" ).append( "<strong>"+data.user+":</strong><p>"+data.message+"</p>" );--}}
    {{--});--}}
    {{--$(".send-msg").click(function(e){--}}
    {{--e.preventDefault();--}}
    {{--var token = $("input[name='_token']").val();--}}
    {{--var user = $("input[name='user']").val();--}}
    {{--var msg = $(".msg").val();--}}
    {{--if(msg != ''){--}}
    {{--$.ajax({--}}
    {{--type: "POST",--}}
    {{--url: 'http://localhost/laravel/mebook/public/sendmessage2',--}}
    {{--dataType: "json",--}}
    {{--data: {'_token':token,'message':msg,'user':user},--}}
    {{--success:function(data){--}}
    {{--console.log(data);--}}
    {{--$(".msg").val('');--}}
    {{--}--}}
    {{--});--}}
    {{--}else{--}}
    {{--alert("Please Add Message.");--}}
    {{--}--}}
    {{--})--}}
{{--@endsection--}}

{{--@endsection--}}