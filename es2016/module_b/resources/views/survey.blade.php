@extends('layouts.page')
@section('content')
   <div class="ui grid container">
        <div class="sixteen wide column">
            <form class="ui form" action="{{route('survey', ['identification' => $s->identification])}}" method="post" enctype="application/x-www-form-urlencoded">
                @csrf
                <div class="ui grid container">
                    <div class="four wide column">
                        <img class="ui medium image" src="{{$s->file}}">
                    </div>
                    <div class="six wide column">
                        <h4 class="ui dividing header">Survey Title</h4>
                        <p>{{$s->title}}</p>
                        <h4 class="ui dividing header">Survey Description</h4>
                        <p>{{$s->description}}</p>
                        <h4 class="ui dividing header">Type of Survey</h4>
                        <p>{{$s->type}}</p>
                    </div>
                    <div class="six wide column">
                        @if($s->type === 'restricted')
                        <h4 class="ui dividing header">Employees</h4>
                        <ul class="ui list">
                            @foreach($s->accesses as $a)
                            <li>{{$a->employee->name}}</li>
                            @endforeach
                        </ul>
                        @endif
                        <h4 class="ui dividing header">Period of Survey</h4>
                        <p><strong>{{$s->start_date}}</strong> to <strong>{{$s->end_date}}</strong></p>
                    </div>

                    <div class="sixteen wide column">
                        <h4 class="ui dividing header">Questions</h4>
                        @foreach($s->questions as $q)
                        <div class="field">
                            <label for="answer-{{$q->id}}">{{$q->question}}</label>
                            <div class="ui input">
                                @if($q->type === 'option')
                                <select name="answer[{{$q->id}}]" id="answer-{{$q->id}}" required>
                                    <option disabled selected value="">Select</option>
                                    @foreach($q->options as $opt)
                                    <option value="{{$opt}}">{{$opt}}</option>
                                    @endforeach
                                </select>
                                @elseif($q->type === 'number')
                                <input type="number" name="answer[{{$q->id}}]" placeholder="Your answer" required id="answer-{{$q->id}}">
                                @else
                                <input type="text" name="answer[{{$q->id}}]" placeholder="Your answer" required id="answer-{{$q->id}}">
                                @endif
                            </div>
                        </div>
                        @endforeach
                        <a href="{{route('index')}}" class="ui button">Cancel</a>
                        <button class="ui button primary" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
