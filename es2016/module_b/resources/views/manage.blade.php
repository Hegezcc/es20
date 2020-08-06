@extends('layouts.page')
@section('content')
   <div class="ui grid container">
        <div class="sixteen wide column">
                <div class="ui grid container">
                    <div class="four wide column">
                        <img class="ui medium image" src="{{$s->file}}">
                    </div>
                    <div class="six wide column">
                        <h4 class="ui dividing header">Survey Identification</h4>
                        <p>{{$s->identification}}</p>
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
                        <h4 class="ui dividing header">Fills</h4>
                        <table class="ui celled table">
                            <thead>
                                <tr>
                                    @foreach($s->questions as $q)
                                        <th>{{$q->question}}</th>
                                    @endforeach
                                        <th>Date and Time</th>
                                        <th>IP Address</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($s->fills as $f)
                                    <tr>
                                        @foreach($f->answers as $a)
                                            <td>{{$a->answer}}</td>
                                        @endforeach
                                            <td>{{$f->created_at}}</td>
                                            <td>{{$f->ip_address}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="42">
                                        <div class="ui right floated segment">
                                            <p>Report generated in {{ Carbon\Carbon::now() }}</p>
                                        </div>
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                        <a href="{{route('index')}}" class="ui button">Index</a>
                        <a href="javascript:window.print()" class="ui button secondary">Print</a>
                        <a href="{{route('logout')}}" class="ui button secondary">Logout</a>
                        <a href="{{route('delete', ['identification' => $s->identification])}}" class="ui button negative">Delete</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
