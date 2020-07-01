@extends('template')

@section('content')
    @php $old = old('option') ?? [] @endphp
    <div id="booking_request">
        <h1 class="page-header">Booking request</h1>
        @if($errors->count())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('booking.request') }}" method="POST">
            @csrf
            <fieldset>
            @if($type === 'individual')
                <legend>Individual</legend>
                <p>Booking an individual guest</p>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Dining experience</th>
                            @foreach($days as $day)
                            <th>{{$day->name}}: {{$day->date}}</th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($experiences as $exp)
                        <tr>
                            <td>{{ $exp['experience']->name }}<br/>{{ $exp['options'][0]['time'] }}</td>
                            @foreach($exp['options'] as $opt)
                            <td>available: {{ $opt->available }} <input type="checkbox" name="option[]" value="{{ $opt->id }}"></td>
                            @endforeach
                        </tr>
                        <tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <legend>Group</legend>
                <p>Booking a group</p>
                <!-- message -->
                <div class="error-message"></div>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    @foreach($days as $day)
                    <li role="presentation" @if($loop->first) class="active" @endif ><a href="#tab-{{$day->name}}" aria-controls="tab-{{$day->name}}" role="tab" data-toggle="tab">{{$day->name}}: {{$day->date}}</a></li>
                    @endforeach
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    @foreach($days as $day)
                    <div role="tabpanel" class="tab-pane @if($loop->first) active @endif " id="tab-{{$day->name}}">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Dining experience</th>
                                    <th>Number of seats available<br/>Number of guests to be seated</th>
                                    <th>Guest names (if known)</th>
                                    <th>Guest country*</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $i = $loop->index @endphp
                                @foreach($experiences as $exp)
                                <tr>
                                    @php $opt = $exp['options'][$i] @endphp
                                    <td>{{ $exp['experience']->name }}<br/>{{ $opt['time'] }}</td>
                                    <td>
                                        available: {{ $opt->available }} <br/><button type="button" class="btn btn-default addguest" id="option-{{ $opt->id }}" data-id="{{ $opt->id }}" onclick="">+ Add guest</button>
                                    </td>
                                    <td id="option-{{ $opt->id }}-n">
                                        @if(array_key_exists($opt->id, $old))
                                            @foreach($old[$opt->id] as $key => $value)
                                            <p><input type="text" id="option-{{$opt->id}}-n{{$key+1}}" name="option[{{$opt->id}}][{{$key}}][name]" class="form-control" value="{{$value['name']}}"></p>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td id="option-{{ $opt->id }}-o">
                                        @if(array_key_exists($opt->id, $old))
                                            @foreach($old[$opt->id] as $key => $value)
                                            <p><select id="option-{{$opt->id}}-o{{$key+1}}" name="option[{{$opt->id}}][{{$key}}][country]" class="form-control">
                                                    <option value="">choose a country</option>
                                                    <option @if($value['country'] === "AU") selected @endif value="AU">AU - Australia</option>
                                                    <option @if($value['country'] === "BR") selected @endif value="BR">BR - Brasil</option>
                                                    <option @if($value['country'] === "CA") selected @endif value="CA">CA - Canada</option>
                                                    <option @if($value['country'] === "CH") selected @endif value="CH">CH - Switzerland</option>
                                                    <option @if($value['country'] === "CN") selected @endif value="CN">CN - China</option>
                                                    <option @if($value['country'] === "DE") selected @endif value="DE">DE - Germany</option>
                                                    <option @if($value['country'] === "FR") selected @endif value="FR">FR - France</option>
                                                    <option @if($value['country'] === "IN") selected @endif value="IN">IN - India</option>
                                                </select></p>
                                            @endforeach
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif
                <p>Please note that most seating take place at the same time and you are not allowed to change once seated.<br />For a seating that is full, you will be waitlisted.</p>
            </fieldset>
            <button class="btn btn-primary" type="submit" @if($type === 'individual') name="book-individual" @else name="book-group" @endif>Submit booking request</button>
        </form>
    </div>
@endsection
