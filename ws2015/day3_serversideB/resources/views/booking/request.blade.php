@extends('template')

@section('content')
    <div id="booking_request">
        <h1 class="page-header">Booking request</h1>

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
                            <th>C1: 04.08.2015</th>
                            <th>C2: 05.08.2015</th>
                            <th>C3: 06.08.2015</th>
                            <th>C4: 07.08.2015</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($experiences as $exp)
                        <tr>
                            <td>{{ $exp['experience']->name }}<br/>{{ $exp['options'][0]['time'] }}</td>
                            @foreach($exp['options'] as $opt)
                            <td>available: {{ $opt->available }} <input type="checkbox" name="option-{{ $opt->id }}"></td>
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
                    <li role="presentation" class="active"><a href="#c1" aria-controls="c1" role="tab" data-toggle="tab">C1: 01.02.2014</a></li>
                    <li role="presentation"><a href="#c2" aria-controls="c2" role="tab" data-toggle="tab">C2: 02.02.2014</a></li>
                    <li role="presentation"><a href="#c3" aria-controls="c3" role="tab" data-toggle="tab">C3: 03.02.2014</a></li>
                    <li role="presentation"><a href="#c4" aria-controls="c4" role="tab" data-toggle="tab">C4: 04.02.2014</a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="c1">
                        <input type="hidden" name="day" value="c1">
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
                                <tr>
                                    <td>Casual Dining<br/>10:50 - 12:30</td>
                                    <td>
                                        available: 22 <br/><button type="button" class="btn btn-default addguest" id="c1-d1" onclick="">+ Add guest</button>
                                    </td>
                                    <td id="c1-d1-n">
                                        <p><input type="text" id="c1-d1-n1" name="c1-d1-n1" class="form-control"></p>
                                        <p><input type="text" id="c1-d1-n2" name="c1-d1-n2" class="form-control"></p>
                                        <p><input type="text" id="c1-d1-n3" name="c1-d1-n3" class="form-control"></p>
                                        <p><input type="text" id="c1-d1-n4" name="c1-d1-n4" class="form-control"></p>
                                    </td>
                                    <td id="c1-d1-o">
                                        <p>
                                            <select id="c1-d1-o1" name="c1-d1-o1" class="form-control">
                                                <option value="">choose a country</option>
                                                <option value="AU">AU - Australia</option>
                                                <option value="BR">BR - Brasil</option>
                                                <option value="CA">CA - Canada</option>
                                                <option value="CH">CH - Switzerland</option>
                                                <option value="CN">CN - China</option>
                                                <option value="DE">DE - Germany</option>
                                                <option value="FR">FR - France</option>
                                                <option value="IN">IN - India</option>
                                            </select>
                                        </p>
                                        <p>
                                            <select id="c1-d1-o2" name="c1-d1-o2" class="form-control">
                                                <option value="">choose a country</option>
                                                <option value="AU">AU - Australia</option>
                                                <option value="BR">BR - Brasil</option>
                                                <option value="CA">CA - Canada</option>
                                                <option value="CH">CH - Switzerland</option>
                                                <option value="CN">CN - China</option>
                                                <option value="DE">DE - Germany</option>
                                                <option value="FR">FR - France</option>
                                                <option value="IN">IN - India</option>
                                            </select>
                                        </p>
                                        <p>
                                            <select id="c1-d1-o3" name="c1-d1-o3" class="form-control">
                                                <option value="">choose a country</option>
                                                <option value="AU">AU - Australia</option>
                                                <option value="BR">BR - Brasil</option>
                                                <option value="CA">CA - Canada</option>
                                                <option value="CH">CH - Switzerland</option>
                                                <option value="CN">CN - China</option>
                                                <option value="DE">DE - Germany</option>
                                                <option value="FR">FR - France</option>
                                                <option value="IN">IN - India</option>
                                            </select>
                                        </p>
                                        <p>
                                            <select id="c1-d1-o4" name="c1-d1-o4" class="form-control">
                                                <option value="">choose a country</option>
                                                <option value="AU">AU - Australia</option>
                                                <option value="BR">BR - Brasil</option>
                                                <option value="CA">CA - Canada</option>
                                                <option value="CH">CH - Switzerland</option>
                                                <option value="CN">CN - China</option>
                                                <option value="DE">DE - Germany</option>
                                                <option value="FR">FR - France</option>
                                                <option value="IN">IN - India</option>
                                            </select>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Casual Dining<br/>13:30 - 14:40</td>
                                    <td>
                                        available: 22 <br/><button type="button" class="btn btn-default addguest" id="c1-d2" onclick="">+ Add guest</button>
                                    </td>
                                    <td id="c1-d2-n">
                                        <p><input type="text" id="c1-d2-n1" name="c1-d2-n1" class="form-control"></p>
                                    </td>
                                    <td id="c1-d2-o">
                                        <p>
                                            <select id="c1-d2-o1" name="c1-d2-o1" class="form-control">
                                                <option value="">choose a country</option>
                                                <option value="AU">AU - Australia</option>
                                                <option value="BR">BR - Brasil</option>
                                                <option value="CA">CA - Canada</option>
                                                <option value="CH">CH - Switzerland</option>
                                                <option value="CN">CN - China</option>
                                                <option value="DE">DE - Germany</option>
                                                <option value="FR">FR - France</option>
                                                <option value="IN">IN - India</option>
                                            </select>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Bar Service<br/>13:15 - 14:45</td>
                                    <td>
                                        available: 22 <br/><button type="button" class="btn btn-default addguest" id="c1-d3" onclick="">+ Add guest</button>
                                    </td>
                                    <td id="c1-d3-n">

                                    </td>
                                    <td id="c1-d3-o">

                                    </td>
                                </tr>
                                <tr>
                                    <td>Fine Dining<br/>13:00 - 15:15</td>
                                    <td>
                                        available: 22 <br/><button type="button" class="btn btn-default addguest" id="c1-d4" onclick="">+ Add guest</button>
                                    </td>
                                    <td id="c1-d4-n">

                                    </td>
                                    <td id="c1-d4-o">

                                    </td>
                                </tr>
                                <tr>
                                    <td>Banquet Dining<br/>12:45 - 15:00</td>
                                    <td>
                                        available: 22 <br/><button type="button" class="btn btn-default addguest" id="c1-d5" onclick="">+ Add guest</button>
                                    </td>
                                    <td id="c1-d5-n">

                                    </td>
                                    <td id="c1-d5-o">

                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="c2">
                        <input type="hidden" name="day" value="c2">
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
                                <tr>
                                    <td>Casual Dining<br/>10:50 - 12:30</td>
                                    <td>

                                    </td>
                                    <td id="c2-d1-n">

                                    </td>
                                    <td id="c2-d1-o">

                                    </td>
                                </tr>
                                <tr>
                                    <td>Casual Dining<br/>13:30 - 14:40</td>
                                    <td>

                                    </td>
                                    <td id="c2-d2-n">

                                    </td>
                                    <td id="c2-d2-o">

                                    </td>
                                </tr>
                                <tr>
                                    <td>Bar Service<br/>13:15 - 14:45</td>
                                    <td>

                                    </td>
                                    <td id="c2-d3-n">

                                    </td>
                                    <td id="c2-d3-o">

                                    </td>
                                </tr>
                                <tr>
                                    <td>Fine Dining<br/>13:00 - 15:15</td>
                                    <td>

                                    </td>
                                    <td id="c2-d4-n">

                                    </td>
                                    <td id="c2-d4-o">

                                    </td>
                                </tr>
                                <tr>
                                    <td>Banquet Dining<br/>12:45 - 15:00</td>
                                    <td>

                                    </td>
                                    <td id="c2-d5-n">

                                    </td>
                                    <td id="c2-d5-o">

                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="c3">
                        <input type="hidden" name="day" value="c3">
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
                                <tr>
                                    <td>Casual Dining<br/>10:50 - 12:30</td>
                                    <td>

                                    </td>
                                    <td id="c3-d1-n">

                                    </td>
                                    <td id="c3-d1-o">

                                    </td>
                                </tr>
                                <tr>
                                    <td>Casual Dining<br/>13:30 - 14:40</td>
                                    <td>

                                    </td>
                                    <td id="c3-d2-n">

                                    </td>
                                    <td id="c3-d2-o">

                                    </td>
                                </tr>
                                <tr>
                                    <td>Bar Service<br/>13:15 - 14:45</td>
                                    <td>

                                    </td>
                                    <td id="c3-d3-n">

                                    </td>
                                    <td id="c3-d3-o">

                                    </td>
                                </tr>
                                <tr>
                                    <td>Fine Dining<br/>13:00 - 15:15</td>
                                    <td>

                                    </td>
                                    <td id="c3-d4-n">

                                    </td>
                                    <td id="c3-d4-o">

                                    </td>
                                </tr>
                                <tr>
                                    <td>Banquet Dining<br/>12:45 - 15:00</td>
                                    <td>

                                    </td>
                                    <td id="c3-d5-n">

                                    </td>
                                    <td id="c3-d5-o">

                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="c4">
                        <input type="hidden" name="day" value="c4">
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
                                <tr>
                                    <td>Casual Dining<br/>10:50 - 12:30</td>
                                    <td>

                                    </td>
                                    <td id="c4-d1-n">

                                    </td>
                                    <td id="c4-d1-o">

                                    </td>
                                </tr>
                                <tr>
                                    <td>Casual Dining<br/>13:30 - 14:40</td>
                                    <td>

                                    </td>
                                    <td id="c4-d2-n">

                                    </td>
                                    <td id="c4-d2-o">

                                    </td>
                                </tr>
                                <tr>
                                    <td>Bar Service<br/>13:15 - 14:45</td>
                                    <td>

                                    </td>
                                    <td id="c4-d3-n">

                                    </td>
                                    <td id="c4-d3-o">

                                    </td>
                                </tr>
                                <tr>
                                    <td>Fine Dining<br/>13:00 - 15:15</td>
                                    <td>

                                    </td>
                                    <td id="c4-d4-n">

                                    </td>
                                    <td id="c4-d4-o">

                                    </td>
                                </tr>
                                <tr>
                                    <td>Banquet Dining<br/>12:45 - 15:00</td>
                                    <td>

                                    </td>
                                    <td id="c4-d5-n">

                                    </td>
                                    <td id="c4-d5-o">

                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif
                <p>Please note that most seating take place at the same time and you are not allowed to change once seated.<br />For a seating that is full, you will be waitlisted.</p>
            </fieldset>
            <button class="btn btn-primary" type="submit" name="book-individual">Submit booking request</button>
        </form>
    </div>
@endsection
