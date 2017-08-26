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

                    <section id="chat-messages-list">

                        <div class="speech-bubble-1">
                            <section>
                                Lorem ipsum dolor sit amet consectetur
                            </section>
                        </div>
                        <div class="speech-bubble-1">
                            <section>
                                Lorem ipsum dolor sit amet consectetur
                            </section>
                        </div>
                        <div class="speech-bubble-1">
                            <section>
                                Lorem ipsum dolor sit amet consectetur
                            </section>
                        </div>
                        <div class="speech-bubble-1">
                            <section>
                                Lorem ipsum dolor sit amet consectetur
                            </section>
                        </div>
                        <div class="speech-bubble-1">
                            <section>
                                Lorem ipsum dolor sit amet consectetur
                            </section>
                        </div>
                        <div class="speech-bubble-1">
                            <section>
                                Lorem ipsum dolor sit amet consectetur
                            </section>
                        </div>
                        <div class="speech-bubble-1">
                            <section>
                                Lorem ipsum dolor sit amet consectetur
                            </section>
                        </div>
                        <div class="speech-bubble-1">
                            <section>
                                Lorem ipsum dolor sit amet consectetur
                            </section>
                        </div>
                        <div class="speech-bubble-1">
                            <section>
                                Lorem ipsum dolor sit amet consectetur
                            </section>
                        </div>
                        <div class="speech-bubble-1">
                            <section>
                                Lorem ipsum dolor sit amet consectetur
                            </section>
                        </div>
                        <div class="speech-bubble-2">
                            <section>
                                Lorem ipsum dolor sit amet consectetur
                            </section>
                        </div>
                    </section>




                </div>

                <div class="type-message">
                    <textarea rows="1" id="type-message-box" class="pull-left" ></textarea>
                    <button class="button1 pull-right" id="message-send-button"
                            data-link="{{ route('user.message.send') }}"
                            data-useridto="{{ Auth::user()->id }}"
                            data-token="{{ csrf_token() }}">
                        Send
                    </button>
                </div>

            </div>


        {{--</div>--}}

    </section>



    <section class="row posts">


        <div class="col-md-6 col-md-offset-3">
            <header><h3>Shared with you..</h3></header>

        </div>
    </section>


    <div class="modal fade" tabindex="-1" role="dialog" id="edit-post-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit post</h4>
                </div>
                <div class="modal-body">
                    <form action="#" id="updateform" method="post">

                        <div class="form-group">
                            <textarea class="form-control"  id="update-post-body" rows="5" ></textarea>
                        </div>
                        {{--<button type="submit" class="btn btn-primary"> Save </button>--}}
                        {{--<input type="hidden" value="{{ \Illuminate\Support\Facades\Session::token() }}" name="_token"/>--}}

                        <input type="hidden" value="{{ \Illuminate\Support\Facades\Session::token() }}" name="_token" id="token"/>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    {{--<button type="submit" class="btn btn-primary">Save changes</button>--}}
                    <button type="button" class="btn btn-primary" id="save-button"> Save </button>

                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <script>
        var URL = '{{ route('post.update') }}';
        var token = '{{ \Illuminate\Support\Facades\Session::token() }}' ;
        var _fromuserid = '{{ Auth::user()->id }}}'
    </script>

@endsection











