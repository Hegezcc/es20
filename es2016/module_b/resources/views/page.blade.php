@extends('master')
@section('content')

    <div class="ui borderless main menu noprint">
        <div class="ui container">
            <a href="{{ route('index') }}">
                <div class="header item">
                    <img class="logo" src="{{route('root')}}/assets/img/logo.jpg">
                </div>
            </a>
            <a href="#" class="item">Institutional</a>
            <a href="#" class="item">About</a>
        </div>
    </div>
    @yield('pageContent')
    <!-- Footer -->
    <div class="ui inverted vertical footer segment noprint">
        <div class="ui center aligned container">
            <div class="ui horizontal inverted small divided link list">
                <a class="item" href="#">Site Map</a>
                <a class="item" href="#">Contact Us</a>
                <a class="item" href="#">Terms and Conditions</a>
                <a class="item" href="#">Privacy Policy</a>
            </div>
        </div>
    </div>
    <!-- /Footer -->
@endsection
