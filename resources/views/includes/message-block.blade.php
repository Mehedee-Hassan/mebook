@if(count($errors) > 0)
    <div class="row">
        <div class="col-md-6">

            <ul>
                @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>

    </div>
@endif

@if(Session::has('message'))
    <div class="row new-post-message">
        <div class="col-md-6 col-md-offset-3 {{ \Illuminate\Support\Facades\Session::get('flag') }}">
            {{ Session::get('message') }}
        </div>

    </div>

@endif