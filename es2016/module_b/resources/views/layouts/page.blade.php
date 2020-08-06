@extends('layouts.master')
@section('bodyClass', '')
@section('pagecontent')
    <div class="ui borderless main menu">
        <div class="ui container">
            <a href="#" class="header item"><img class="logo" src="assets/img/logo.jpg" alt="ittech"></a>
            <a href="#" class="item">Institutional</a>
            <a href="#" class="item">About</a>
        </div>
    </div>
    @yield('content')
    <!-- Footer -->
    <div class="ui inverted vertical footer segment">
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
