Booking Confirmation

{{$res->name}}, thank you for your booking request #{{$res->id}}.

We are happy to send you the latest information about guest confirmation:

@foreach($res->diningOptions as $opt)
{{$opt->day->name}} - {{$opt->day->date}}, {{$opt->diningExperience->name}} for
@foreach($res->guests->where('dining_option_id', $opt->id) as $guest)
{{$guest->name}} {{$guest->country}} - {{$guest->status}}
@endforeach

@endforeach

Please note that your guests need to arrive at Restaurant Service at least 10 minutes prior to the scheduled seating time.
