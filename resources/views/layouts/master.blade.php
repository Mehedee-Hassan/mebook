<html>

<head>
    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}"/>
</head>
<body>
    @include('includes.header')

    <div class="container">
        @yield('content')
    </div>

<!-- Latest compiled and minified JavaScript -->
    <script src="{{ URL::asset('js/app.js') }}" ></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
{{--<script src="https://code.jquery.com/jquery-3.2.1.js" ></script>--}}
<script src="https://code.jquery.com/jquery-migrate-1.4.1.js" ></script>

<script src="{{ URL::asset('js/main.js') }}" ></script>


</body>

</html>