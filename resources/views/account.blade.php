@extends('layouts.master')


@section('title')
Account
    @endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
{{--                @if (Storage::disk('local')->has($user->name . '-' . $user->id . '.jpeg'))--}}

                <img src="{{ route('account.image') }}"
                     style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;" class="img-responsive">

                {{--@else--}}

                {{--<img src="{{ URL::asset('')}}/uploads/avatars/{{ $user->avatar }}"--}}
                     {{--style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">--}}

                {{--@endif--}}
                {{--<img src="{{URL::asset('')}}/uploads/avatars/{{ $user->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">--}}
                <h2>{{ $user->name }}'s Profile</h2>
                <form enctype="multipart/form-data" action="{{ route('update.avatar') }}" method="POST">
                    <label>Update Profile Image</label>
                    <input type="file" name="avatar">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    {{--<input type="submit" class="pull-right btn btn-sm btn-primary">--}}

                    <button type="submit" class="pull-right btn btn-primary" aria-label="Left Align">
                        <span class="glyphicon glyphicon-upload" aria-hidden="true"></span>
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>
    {{--@if (Storage::disk('local')->has($user->first_name . '-' . $user->id . '.jpg'))--}}
        {{--<section class="row new-post">--}}
            {{--<div class="col-md-6 col-md-offset-3">--}}
                {{--<img src="{{ route('account.image', ['filename' => $user->first_name . '-' . $user->id . '.jpg']) }}" alt="" class="img-responsive">--}}
            {{--</div>--}}
        {{--</section>--}}
    {{--@endif--}}

@endsection

{{--{{ URL::asset('/uploads/avatars/'+$user->avatar) }}--}}
{{--public/uploads/avatars/default.jpeg--}}
