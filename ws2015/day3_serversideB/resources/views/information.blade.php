@extends('layout')

@section('content')

    <!-- for guest only - begin -->
    <div id="dining_experience_descriptions">
        <div class="">
            <div class="row">
                <div class="col-xs-6">
                    <h1>Guests in Restaurant Service</h1>
                    <p class="clearfix">Become part of the competition: be a guest in Restaurant Service competition by requesting a seat and enjoy one of the different dining experiences!</p>
                </div>
                <div class="col-xs-offset-2 col-xs-4 col-sm-offset-4 col-sm-2">
                    <h1><img src="6215177259.jpg" alt="cook in restaurant service" class="img-thumbnail img-responsive"></h1>
                </div>
            </div>
            <h3>Dining experience desriptions</h3>
            <table class="table table-bordered">
                <colgroup>
                    <col style="width: 25%">
                    <col style="width: 25%">
                    <col style="width: 25%">
                    <col style="width: 25%">
                </colgroup>
                <thead>
                <tr>
                    @foreach($exps as $exp)
                    <th>{{ $exp->name }}</th>
                    @endforeach
                </tr>
                </thead>
                <tbody>
                <tr>
                    @foreach($exps as $exp)
                        <td>{{ $exp->description }}</td>
                    @endforeach
                </tr>
                <tr>
                    @foreach($exps as $exp)
                        <td>Tables of {{ $exp->tables->join(', ', ' and ') }}</td>
                    @endforeach
                </tr>
                <tr>
                    @foreach($exps as $exp)
                        <td>
                            @foreach($exp->seatings as $seating)
                                Seating{{ $loop->count !== 1 ? ' ' . $loop->iteration : '' }}: {{ $seating->time }}<br>
                            @endforeach
                        </td>
                    @endforeach
                </tr>
                </tbody>
            </table>
            <a class="btn btn-primary" href="{{ route('booking.reservation') }}">Start booking</a>
        </div>
    </div>
@endsection
