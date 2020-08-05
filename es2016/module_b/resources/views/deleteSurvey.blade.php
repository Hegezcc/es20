@extends('master')
@section('bodyClass', 'login')
@section('content')
    <div class="ui middle aligned center aligned grid">
        <div class="column column-login">
            <a href="{{route('index')}}">
                <h2 class="ui teal image header">

                    <img src="{{asset('assets/img/logo.jpg')}}" class="image">

                    <span class="content">
                        Delete survey?
                    </span>
                </h2>
            </a>
            <form class="ui large form" method="POST" action="{{route('manage.delete', $identification)}}">
                @csrf
                <div class="ui stacked segment">
                    <a href="{{route('manage', $identification)}}" class="ui button">Back</a>
                    <button type="submit" class="ui button red">Delete</button>
                </div>
            </form>
        </div>
    </div>
@endsection
