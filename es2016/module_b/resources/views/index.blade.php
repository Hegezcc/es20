@extends('layouts.page')
@section('content')
    <div class="ui grid">
        <div class="banner wide column sixteen">
            <div class="register">
                <p>Register your survey</p>
            </div>
            <div class="collect">
                <p>Collect answers</p>
            </div>
            <div class="results">
                <p>Print the results</p>
            </div>
        </div>
    </div>

    @if(session()->has('manage-link'))
        <div class="ui grid container">
            <div class="ui success message">
                <p>Success! Your survey can be managed at:</p>
                <p><a href="{{route('manage', ['identification' => session('manage-link')])}}">{{route('manage', ['identification' => session('manage-link')])}}</a></p>
            </div>
    </div>
    @endif

    <div class="ui grid container">
        <div class="sixteen wide column">
            <h1 class="ui header">Open surveys <a class="ui button primary new-survey" href="{{route('newSurvey')}}"><i class="add square icon"></i> New survey</a></h1>
        </div>
    </div>

    <div class="ui grid container">
        <!-- Survey -->
        @foreach($surveys as $s)
        <div class="four wide column">
            <div class="ui card">
                <div class="image">
                    <img src="{{$s->file}}" alt="survey image">
                </div>
                <div class="content">
                    <a class="header" href="{{route('survey', ['identification' => $s->identification])}}">{{$s->title}}</a>
                    <div class="meta">
                        <span class="date"><strong>{{$s->start_date}}</strong> to <strong>{{$s->end_date}}</strong></span>
                    </div>
                </div>
                <div class="extra content">
                    <i class="check icon"></i>
                    {{$s->fills->count()}} Completed surveys
                </div>
            </div>
        </div>
        <!-- /Survey -->
        @endforeach
    </div>
@endsection
