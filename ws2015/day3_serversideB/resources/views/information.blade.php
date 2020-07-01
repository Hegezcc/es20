@extends('template')

@section('content')
    <div id="dining_experience_descriptions">
        <div class="">
            <div class="row">
                <div class="col-xs-6">
                    <h1>Guests in Restaurant Service</h1>
                    <p class="clearfix">Become part of the competition: be a guest in Restaurant Service competition by requesting a seat and enjoy one of the different dining experiences!</p>
                </div>
                <div class="col-xs-offset-2 col-xs-4 col-sm-offset-4 col-sm-2">
                    <h1><img src="{{ asset('media/6215177259.jpg') }}" alt="cook in restaurant service" class="img-thumbnail img-responsive"></h1>
                </div>
            </div>
            <h3>Dining experience desriptions</h3>
            <table class="table table-bordered">
                <colgroup>
                    @foreach($experiences as $exp)
                    <col style="width: 25%">
                    @endforeach
                </colgroup>
                <thead>
                <tr>
                    @foreach($experiences as $exp)
                    <th>{{ $exp->name }}</th>
                    @endforeach
                </tr>
                </thead>
                <tbody>
                <tr>
                    @foreach($experiences as $exp)
                        <td>{{ $exp->description }}</td>
                    @endforeach

                </tr>
                <tr>
                    @foreach($experiences as $exp)
                        <td>Tables of {{ $exp->diningOptions()->where('day_id', 1)->pluck('guest_count')->sort()->join(', ', ' and ') }}</td>
                    @endforeach

                </tr>
                <tr>
                    @foreach($experiences as $exp)
                        <td>
                            @foreach($exp->diningOptions()->where('day_id', 1)->pluck('time') as $time)
                            Seating{{ $loop->count === 1 ? '' : " {$loop->iteration}" }}: {{$time}}<br>
                            @endforeach
                        </td>
                    @endforeach

                </tr>
                </tbody>
            </table>
            <form action="{{ route('booking.start') }}">
                <button class="btn btn-primary" type="submit" name="start-booking">Start booking</button>
            </form>
        </div>
    </div>
@endsection
