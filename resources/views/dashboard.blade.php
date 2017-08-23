@extends('layouts.master')


@section('content')
    <section class="row new-post">
        @include('includes.message-block')

        <div class="col-md-6 col-md-offset-3">
            <header><h3>Open up your mid...</h3></header>
            <form action="{{ route('post.create') }}" method="post">
                <div class="form-group">
                    <textarea class="form-control" name="new-post" id="new-post" rows="5" placeholder="share with your friends.."></textarea>
                </div>
            <button type="submit" class="btn btn-primary"> Post </button>
            <input type="hidden" value="{{ \Illuminate\Support\Facades\Session::token() }}" name="_token"/>
            </form>
        </div>

    </section>



    <section class="row posts">


        <div class="col-md-6 col-md-offset-3">
            <header><h3>Shared with you..</h3></header>

            @foreach($posts as $post)
            <article class="post">
                <p>
                   {{ $post->body }}
                </p>
                <div class="info">
                    By <b>{{ $post->user->name }}</b> on {{ $post->created_at }}
                </div>

                <div class="update-post">
                    <a href="#">Edit</a>
                    <a href="#">Delete</a>
                </div>
                <br/>
                <div class="interaction">
                    <a href="#">Like</a>
                </div>


            </article>

            @endforeach

            <article class="post">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
                <div class="info">
                    By <b>Max</b> on 12 Feb 2016s
                </div>

                <div class="update-post">
                    <a href="#">Edit</a>
                    <a href="#">Delete</a>
                </div>
                <br/>
                <div class="interaction">
                    <a href="#">Like</a>
                </div>


            </article>
            <article class="post">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
                <div class="info">
                    By <b>Max</b> on 12 Feb 2016s
                </div>

                <div class="interaction">
                    <a href="#">Edit</a>
                    <a href="#">Delete</a>
                </div>
                <br/>
                <div class="interaction">
                    <a href="#">Like</a>
                </div>


            </article>
        </div>
    </section>
@endsection











