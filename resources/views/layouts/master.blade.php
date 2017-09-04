<html>
@include('includes.header')
<head>
    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}"/>
</head>
<body>


    <div class="container">
        @yield('content')
    </div>

<!-- Latest compiled and minified JavaScript -->
    <script src="{{ URL::asset('js/jquery.min.js') }}" ></script>
{{--    <script src="{{ URL::asset('js/jquery-migrate-1.4.1.js') }}" ></script>--}}
    <script src="{{ URL::asset('js/bootstrap.min.js') }}" ></script>
    <script src="{{ URL::asset('js/socket.io.js') }}" ></script>
{{--<script src="https://code.jquery.com/jquery-3.2.1.js" ></script>--}}

    <script src="{{ URL::asset('js/main.js') }}" ></script>

    <script>

        @yield('script')

    </script>
    @yield('js-without-tag')


    <span id="user-data-saved" data-userid="{{ Auth::user()->id }}"></span>
    <script>

        var socket = io.connect('http://localhost:3000/');

        var globalmessageCount = 0;

        socket.on('test-channel:NewPost', function(data) {

            console.log('channel '+data.user);
            console.log(data.user);
            var _fromuserid = $("#user-data-saved").attr("data-userid");

            if(data.user == _fromuserid) {

            }
            else {
                globalmessageCount += 1;

                $(".post-notification-cnt").html("<sub><b>"+globalmessageCount+"</b></sub>");
                $(".post-notification-cnt").addClass("red-color");
            }

        });


    </script>



</body>

</html>