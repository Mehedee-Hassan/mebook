<header>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('dashboard') }}">MeBook</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->

            @if(\Illuminate\Support\Facades\Auth::user())

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                {{--<ul class="nav navbar-nav navbar-right">--}}
                    {{--<li>--}}
                        {{--<a href="{{ route('logout') }}"> Logout</a>--}}

                    {{--</li> <li>--}}
                        {{--<a href="{{ route('user.account') }}"> Account </a>--}}

                    {{--</li>--}}

                {{--</ul>--}}
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    {{--@if (Auth::guest())--}}
                        {{--<li><a href="{{ url('/login') }}">Login</a></li>--}}
                        {{--<li><a href="{{ url('/register') }}">Register</a></li>--}}
                    {{--@else--}}
                        <li class="dropdown">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position:relative; padding-left:50px;">
                                <img src="{{ route('account.image') }}"
                                     style="width:32px; height:32px; position:absolute; top:10px; left:10px; border-radius:50%">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ route('user.account') }}"><i class="fa fa-btn fa-user"></i>Accout</a></li>
                                <li><a href="{{ route('logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>

                        </li>
                    {{--@endif--}}
                </ul>

            </div><!-- /.navbar-collapse -->
                @endif
        </div><!-- /.container-fluid -->
    </nav>

</header>
