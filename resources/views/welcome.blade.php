@extends('layouts.master')


@section('title')
    Welcome
    @endsection

@section('content')



    <div class="row">
        <div class="col-md-6">
            <h3>Sign Up</h3>

            <form action="{{ route('signup') }}" method="post">
                <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                    <label for="email">Email </label>
                    <input class="form-control" type="text" name="email" id="email" value="{{ \Illuminate\Support\Facades\Request::old('email') }}"/>
                </div>
                <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                    <label for="name">Name </label>
                    <input class="form-control" type="text" name="name" id="name"/>
                </div>

                <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                    <label for="password">Password </label>
                    <input class="form-control" type="password" name="password" id="password"/>
                </div>

                {{--<input type="submit" class="btn btn-primary" value="Register"/>--}}

                <button type="submit" class="btn btn-primary" aria-label="Left Align">
                    <span class="glyphicon glyphicon-user" aria-hidden="true"> </span> Register
                </button>

                <input type="hidden" name="_token" value="{{ \Illuminate\Support\Facades\Session::token() }}">

            </form>
        </div>


        <div class="col-md-6">
<h3>Sign In</h3>
            <form action="{{ route('signin') }}" method="post">
                <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                    <label for="email">Email </label>
                    <input class="form-control" type="text" name="email" id="email"/>
                </div>


                <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                    <label for="password">password </label>
                    <input class="form-control" type="password" name="password" id="password"/>
                </div>

                {{--<input type="submit" class="btn btn-primary" value="submit"/>--}}

                <button type="submit" class="btn btn-primary" aria-label="Left Align">
                    <span class="glyphicon glyphicon-log-in" aria-hidden="true"> </span> Login
                </button>


                <input type="hidden" name="_token" value="{{ \Illuminate\Support\Facades\Session::token() }}">

            </form>
        </div>
    </div>


    @endsection