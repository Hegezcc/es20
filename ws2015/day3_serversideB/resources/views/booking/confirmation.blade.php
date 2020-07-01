@extends('template')

@section('content')
    <div id="submission_confirmation">
        <h1 class="page-header">Submission confirmation</h1>
        <p>
            {{ $res->name }},<br/><br/>
            Thank you for your booking request #{{ $res->id }}.<br/><br/>

            You have requested booking for the following guests:
        </p>
        <ul>
            @foreach($res->diningOptions as $opt)
            <li>{{$opt->day->name}} - {{$opt->day->date}}, {{$opt->diningExperience->name}} <br/>for {{ $res->guests->where('dining_option_id', $opt->id)->map(function ($x) {return "$x->name $x->country";})->join(', ', ' and ') }}</li>
            @endforeach
        </ul>
        <p>
            Please note that these booking requests will need to be reviewed and confirmed by WSI. <br/>
            You will receive an email with the confirmation as soon as possible.
        </p>
    </div>
@endsection
