@extends('template')

@section('content')
    <div id="reservation_management">
        <h1>Reservation management</h1>
        <form action="{{ route('management.save') }}" method="POST">
            @csrf
            <fieldset>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <colgroup>
                            <col style="width: 5%">
                            <col style="width: 30%">
                            <col style="width: 10%">
                            <col style="width: 30%">
                            <col style="width: 10%">
                            <col style="width: 5%">
                            <col style="width: 5%">
                            <col style="width: 5%">
                            <col style="width: 5%">
                        </colgroup>
                        <thead>
                        <tr>
                            <th rowspan="2">Day</th>
                            <th rowspan="2">Seating</th>
                            <th rowspan="2">Booking No.</th>
                            <th rowspan="2">Guests</th>
                            <th rowspan="2">Status</th>
                            <th colspan="4">Action</th>
                        </tr>
                        <tr>
                            <th>Confirm</th>
                            <th>Decline</th>
                            <th>Waitlist</th>
                            <th>Reschedule</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($guests as $guest)
                        <tr>
                            <td>{{$guest->diningOption->day->name}}</td>
                            <td>{{$guest->diningOption->diningExperience->name}} {{$guest->diningOption->time}}</td>
                            <td><span title="{{$guest->reservation->name}}, {{$guest->reservation->organization}}, {{$guest->reservation->phone}}, {{$guest->reservation->email}}, {{$guest->reservation->country}}">#{{$guest->reservation->id}}</span></td>
                            <td>{{$guest->name}} {{$guest->country}}</td>
                            <td>{{$guest->status}}</td>
                            <td>@if($guest->status === 'requested')<p class="text-center"><input type="radio" name="status[{{$guest->id}}]" value="confirmed"></p>@endif</td>
                            <td>@if($guest->status === 'requested')<p class="text-center"><input type="radio" name="status[{{$guest->id}}]" value="declined"></p>@endif</td>
                            <td>@if($guest->status === 'requested')<p class="text-center"><input type="radio" name="status[{{$guest->id}}]" value="waitlisted"></p>@endif</td>
                            <td>@if($guest->status === 'requested')<p class="text-center"><input type="radio" name="status[{{$guest->id}}]" value="reschedule"></p>@endif</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </fieldset>
            <button class="btn btn-default" type="submit" name="create-guest-list">Create guest list</button>
            <button class="btn btn-default" type="submit" name="send-emails">Send emails</button>
            <button class="btn btn-primary" type="submit" name="save-confirmations">Save changes</button>
        </form>
    </div>
@endsection
