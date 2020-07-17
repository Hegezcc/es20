@extends('master')
@section('bodyClass', 'login')
@section('content')
    <div class="ui middle aligned center aligned grid">
        <div class="column column-login">
            <a href="{{route('index')}}">
            <h2 class="ui teal image header">
                <img src="{{asset('assets/img/logo.jpg')}}" class="image">
                <div class="content">
                    Log-in to manage survey
                </div>
            </h2>
            </a>
            @if($denied)
                <div class="ui large">
                    <div class="ui stacked segment">
                        <h1>ACCESS NOT PERMITTED</h1>
                    </div>
                </div>
            @else
            <form class="ui large form" method="POST" action="{{route('manage.auth', $identification)}}">
                @csrf
                <div class="ui stacked segment">
                    <div class="field">
                        <div class="ui left icon input">
                            <input type="password" name="password" placeholder="Password">
                        </div>
                    </div>
                    <button class="ui fluid large teal submit button">Login</button>
                </div>
            </form>

            <div class="ui message">
                New to us? <a href="#">Sign Up</a>
            </div>
            @endif
        </div>
    </div>
@endsection
