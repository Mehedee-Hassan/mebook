@extends('layouts.master')


@section('title')
    Welcome
    @endsection

@section('content')

    <div class="row">
        <div class="col-md-6">
            <h3>Sign Up</h3>

            <form action="#" method="post">
                <div class="form-group">
                    <label for="email">Email </label>
                    <input class="form-control" type="text" name="email" id="email"/>
                </div>
                <div class="form-group">
                    <label for="Name">Name </label>
                    <input class="form-control" type="text" name="Name" id="Name"/>
                </div>

                <div class="form-group">
                    <label for="Password">Password </label>
                    <input class="form-control" type="password" name="Password" id="Password"/>
                </div>

                <input type="submit" class="btn btn-primary" value="submit"/>

            </form>
        </div>


        <div class="col-md-6">
<h3>Sign In</h3>
            <form action="#" method="post">
                <div class="form-group">
                    <label for="email">Email </label>
                    <input class="form-control" type="text" name="email" id="email"/>
                </div>
                

                <div class="form-group">
                    <label for="Password">Password </label>
                    <input class="form-control" type="password" name="Password" id="Password"/>
                </div>

                <input type="submit" class="btn btn-primary" value="submit"/>

            </form>
        </div>
    </div>


    @endsection