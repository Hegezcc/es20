@extends('master')
@section('bodyClass', 'login')
@section('content')
    <div class="ui middle aligned center aligned grid">
        <div class="column column-login">
            <a href="{{route('index')}}">
                <h2 class="ui teal image header">

                    <img src="{{asset('assets/img/logo.jpg')}}" class="image">

                    <span class="content">
                        Log-in to access the restrict survey
                    </span>
                </h2>
            </a>
            <form class="ui large form" method="POST" action="{{route('auth', $identification)}}">
                @csrf
                <div class="ui stacked segment">
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="envelope icon"></i>
                            <input type="text" name="email" placeholder="E-mail address">
                        </div>
                    </div>
                    <button class="ui fluid large teal submit button">Access</button>
                </div>
            </form>

            <div class="ui message">
                New to us? <a href="#">Sign Up</a>
            </div>
        </div>
    </div>
@endsection
