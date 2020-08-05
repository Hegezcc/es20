@extends('page')
@section('pageContent')
   <div class="ui grid container">
        <div class="sixteen wide column">
            <form class="ui form" method="POST" action="{{route('survey', $s->identification)}}">
                @csrf
                @if($s->survey_type)
                    <input type="hidden" name="employee_id" value="">
                @endif
                <input type="hidden" name="survey_id" value="{{$s->id}}">
                <div class="ui grid container">
                    <div class="four wide column">
                        <img class="ui medium image" src="{{$s->file ? Storage::url($s->file) : asset('assets/img/default.png')}}">
                    </div>
                    <div class="six wide column">
                        <h4 class="ui dividing header">Survey Title</h4>
                        <p>{{$s->survey_title}}</p>
                        <h4 class="ui dividing header">Survey Description</h4>
                        <p>{{$s->survey_description}}</p>
                        <h4 class="ui dividing header">Type of Survey</h4>
                        <p>{{$s->survey_type}}</p>
                    </div>
                    <div class="six wide column">
                        @if($s->access)
                        <h4 class="ui dividing header">Employees</h4>
                        <ul class="ui list">
                            @foreach($s->access as $emp)
                                <li>{{$emp->name}}</li>
                            @endforeach
                        </ul>
                        @endif
                        <h4 class="ui dividing header">Period of Survey</h4>
                        <p><strong>{{$s->start_date->format('Y-m-d')}}</strong> to <strong>{{$s->end_date->format('Y-m-d')}}</strong></p>
                    </div>
                    <div class="sixteen wide column">
                        <h4 class="ui dividing header">Questions</h4>
                        <div class="error">
                            @if ($errors->any())
                                <div class="ui ignored negative message">
                                    @foreach($errors->all() as $err)
                                        <p>{{ $err }}</p>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                        @foreach($s->questions as $q)
                        <div class="field">
                            <label>{{$q->title}}</label>
                            @if($q->type === 'option')
                                <select required name="answer[{{$q->id}}]" class="@error('answer.' . $q->id) has-error @enderror" oninvalid="setCustomValidity('Field must be {{collect($q->options_list)->join(', ', ' or ')}}')" onchange="this.setCustomValidity('')">
                                    <option value="" @if(!old('answer')[$q->id] || old('answer')[$q->id] === '') selected @endif disabled>Select</option>
                                @foreach($q->options_list as $opt)
                                    <option value="{{$opt}}" @if(old('answer')[$q->id] === $opt) selected @endif >{{$opt}}</option>
                                @endforeach
                                </select>
                            @elseif($q->type === 'number')
                                <input required type="number" placeholder="Your answer" name="answer[{{$q->id}}]" value="{{old('answer')[$q->id]}}" class="@error('answer.' . $q->id) has-error @enderror" oninvalid="setCustomValidity('Field must be a number.')" onchange="this.setCustomValidity('')">
                            @else
                                <input required type="text" placeholder="Your answer" name="answer[{{$q->id}}]" value="{{old('answer')[$q->id]}}" class="@error('answer.' . $q->id) has-error @enderror" oninvalid="setCustomValidity('Field is required.')" onchange="this.setCustomValidity('')">
                            @endif
                        </div>
                        @endforeach

                        <a href="{{route('index')}}" class="ui button">Back</a>
                        <button class="ui button primary" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
