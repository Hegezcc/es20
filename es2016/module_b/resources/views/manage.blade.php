@extends('page')
@section('pageContent')
   <div class="ui grid container">
        <div class="sixteen wide column">
            <div class="ui grid container">
                <div class="four wide column noprint">
                    <img class="ui medium image" src="{{$s->file ? Storage::url($s->file) : asset('assets/img/default.png')}}">
                </div>
                <div class="six wide column">
                    <h4 class="ui dividing header">Survey Title</h4>
                    <p>{{$s->survey_title}}</p>
                    <h4 class="ui dividing header">Survey Identification</h4>
                    <p>{{$s->identification}}</p>
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
                    <h4 class="ui dividing header">Survey fills</h4>
                    <table class="ui celled table">
                        <thead>
                            <tr>
                                @foreach($s->questions()->pluck('title') as $q)
                                    <th>{{$q}}</th>
                                @endforeach
                                    <th>Date and Time</th>
                                    <th>IP Address</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($s->survey_fills as $sf)
                            <tr>
                                @foreach($sf->answers()->pluck('answer') as $a)
                                    <td>{{$a}}</td>
                                @endforeach
                                <td>{{$sf->updated_at}}</td>
                                <td>{{$sf->ip_address}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="42">
                                    <a href="javascript:window.print()" class="ui button">Print</a>
                                    <p class="ui right floated segment">Report generated in {{Carbon\Carbon::now()}}</p>
                                </th>
                            </tr>
                        </tfoot>
                    </table>

                    <a href="{{route('index')}}" class="ui button">Back</a>
                    <a href="{{route('logout')}}" class="ui button secondary">Logout</a>
                    <a href="{{route('manage.delete', $s->identification)}}" class="ui button red">Delete</a>
                </div>
            </div>
        </div>
    </div>
@endsection
