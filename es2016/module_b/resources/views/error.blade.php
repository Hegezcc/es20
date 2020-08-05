@extends('master')
@section('bodyClass', 'login error')
@section('content')
    <div class="ui middle aligned center aligned grid">
        <div class="column column-login">
            <a href="{{route('index')}}">
                <h2 class="ui teal image header">

                    <img src="{{asset('assets/img/logo.jpg')}}" class="image">

                    <span class="content">
                        Click here to get back to index
                    </span>
                </h2>
            </a>
            <div class="ui large">
                <div class="ui stacked segment">
                    <h1>{{$error}}</h1>
                </div>
            </div>
        </div>
    </div>
@endsection
