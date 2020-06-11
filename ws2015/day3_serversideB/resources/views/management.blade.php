@extends('template')

@section('content')
    <div id="reservation_management">
        <h1>Reservation management</h1>
        <form action="#">
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
                        <tr>
                            <td>C2</td>
                            <td>Casual Dining 10:50 - 12:30</td>
                            <td><span title="Sarah Rogers, WSI, +51342319531, sarah.rogers@worldskills.org, US">2015000008</span></td>
                            <td>1. Jimmy Hendrix US</td>
                            <td>requested</td>
                            <td><p class="text-center"><input type="radio" name="2015000008-1" value="confirm"></p></td>
                            <td><p class="text-center"><input type="radio" name="2015000008-1" value="decline"></p></td>
                            <td><p class="text-center"><input type="radio" name="2015000008-1" value="waitlist"></p></td>
                            <td><p class="text-center"><input type="radio" name="2015000008-1" value="reschedule"></p></td>
                        </tr>
                        <tr>

                            <td>C2</td>
                            <td>Casual Dining 10:50 - 12:30</td>
                            <td><span title="Sarah Rogers, WSI, +51342319531, sarah.rogers@worldskills.org, US">2015000008</span></td>
                            <td>2. Joe Cocker US</td>
                            <td>requested</td>
                            <td><p class="text-center"><input type="radio" name="2015000008-2" value="confirm"></p></td>
                            <td><p class="text-center"><input type="radio" name="2015000008-2" value="decline"></p></td>
                            <td><p class="text-center"><input type="radio" name="2015000008-2" value="waitlist"></p></td>
                            <td><p class="text-center"><input type="radio" name="2015000008-2" value="reschedule"></p></td>
                        </tr>

                        <tr>
                            <td>C2</td>
                            <td>Casual Dining 10:50 - 12:30</td>
                            <td><span title="Sarah Rogers, WSI, +51342319531, sarah.rogers@worldskills.org, US">2015000008</span></td>
                            <td>3. Jennifer Celebrity US</td>
                            <td>declined</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td>C2</td>
                            <td>Casual Dining 10:50 - 12:30</td>
                            <td><span title="Sarah Rogers, WSI, +51342319531, sarah.rogers@worldskills.org, US">2015000008</span></td>
                            <td>4. Simon Bartley UK</td>
                            <td>confirmed</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td>C2</td>
                            <td>Casual Dining 10:50 - 12:30</td>
                            <td><span title="Sarah Rogers, WSI, +51342319531, sarah.rogers@worldskills.org, US">2015000008</span></td>
                            <td>5. Nieman Anders AU</td>
                            <td>waitlisted</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
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
