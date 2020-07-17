@extends('page')
@section('pageContent')
    <div class="ui grid">
        <div class="banner wide column sixteen">
        </div>
    </div>

    <div class="ui grid container">
        <div class="sixteen wide column">
            <h1 class="ui header">Open surveys <a class="ui button primary new-survey" href="{{ route('newSurvey') }}"><i class="add square icon"></i> New survey</a></h1>
        </div>
    </div>

    @if(session('manage_link'))
        <div class="ui grid container">
            <div class="sixteen wide column">
                 <h3>Survey successfully created!</h3>
            </div>
            <div class="sixteen wide column">
                 <p>Manage it from here:</p>
            </div>
            <div class="sixteen wide column">
                 <a href="{{route('manage', session('manage_link'))}}">{{route('manage', session('manage_link'))}}</a>
            </div>
        </div>
    @endif

    <div class="ui grid container">
        @foreach($surveys as $s)
        <div class="four wide column">
            <div class="ui card">
                <div class="image">
                    <img alt="survey banner" src="{{$s->file ? Storage::url($s->file) : asset('assets/img/default.png')}}">
                </div>
                <div class="content">
                    <a class="header" href="{{ route('survey', $s->identification) }}">{{$s->survey_title}}</a>
                    <div class="meta">
                        <span class="date"><strong>{{$s->start_date->format('Y-m-d')}}</strong> to <strong>{{$s->end_date->format('Y-m-d')}}</strong></span>
                    </div>
                </div>
                <div class="extra content">
                    <i class="check icon"></i>
                    {{$s->survey_fills()->count()}} Completed surveys
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
