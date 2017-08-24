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
                <p class="post-para">
                   {{ $post->body }}
                </p>
                <div class="info">
                    By <b>{{ $post->user->name }}</b> on {{ $post->created_at }}
                </div>

                @if($post->user->id == \Illuminate\Support\Facades\Auth::user()->id)
                <div class="update-post">
                    <a href="#" class="edit">Edit</a>
                    <a href="{{ route('post.delete',['post_id' => $post->id] ) }}">Delete</a>
                </div>
                @endif

                <br/>
                <div class="interaction">
                    <a href="#">Like</a>
                </div>
                <input type="hidden" value="{{ $post->id }}" id="post-id"/>



            </article>

            @endforeach

        </div>
    </section>


    <div class="modal fade" tabindex="-1" role="dialog" id="edit-post-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit post</h4>
                </div>
                <form action="{{ route('post.update',['post_id'=>1]) }}" method="post">
                <div class="modal-body">

                        <div class="form-group">
                            <textarea class="form-control" name="new-post" id="update-post-body" rows="5" ></textarea>
                        </div>
                        {{--<button type="submit" class="btn btn-primary"> Save </button>--}}
                        <input type="hidden" value="{{ \Illuminate\Support\Facades\Session::token() }}" name="_token"/>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    {{--<button type="submit" class="btn btn-primary">Save changes</button>--}}
                    <button type="submit" class="btn btn-primary" id="save-button"> Save </button>

                </div>
                    <input type="hidden" value="{{ \Illuminate\Support\Facades\Session::token() }}" name="_token" id="token"/>

                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <script>
        var URL = '{{ route('post.update') }}';
    </script>

@endsection











