@extends('layouts.master')
@section('bodyClass', 'login')
@section('pagecontent')
    <div class="ui middle aligned center aligned grid">
        <div class="column column-login">
            <h2 class="ui teal image header">
                <img src="{{url('/')}}/assets/img/logo.jpg" class="image">
                <div class="content">
                    Log-in to manage survey
                </div>
            </h2>

            <form class="ui large form">
                <div class="ui stacked segment"">
                <div class="field">
                    <div class="ui left icon input">
                        <input type="text" name="email" placeholder="Password">
                    </div>
                </div>
                <button class="ui fluid large teal submit button">Login</button>
            </form>
        </div>
        <div class="ui message">
            New to us? <a href="#">Sign Up</a>
        </div>
    </div>
@endsection
