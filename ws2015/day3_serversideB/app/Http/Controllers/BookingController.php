<?php

namespace App\Http\Controllers;

use App\Day;
use App\DiningOption;
use App\Guest;
use App\Reservation;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function startBooking(Request $request)
    {
        return view('booking.contact');
    }

    public function saveBookingContact(Request $request)
    {
        $data = $request->validate(Reservation::$validation);

        if ($request->has('agree-individual')) {
            $data['type'] = 'individual';
        } else {
            $data['type'] = 'group';
        }

        unset($data['agree']);

        $reservation = Reservation::updateOrCreate($data);

        session(['reservation_id' => $reservation->id]);
        session(['reservation_id' => $reservation->id]);

        return redirect()->route('booking.request');
    }

    public function getBookingOptions(Request $request)
    {
        $options = DiningOption::all();
        $type = Reservation::where('id', session('reservation_id'))->pluck('type')->get(0);
        $days = Day::all();

        $experiences = [];

        foreach ($options as $opt) {
            $needle = "$opt->dining_experience_id - $opt->time";
            if (!array_key_exists($needle, $experiences)) {
                $experiences[$needle] = [
                    'experience' => $opt->diningExperience,
                    'options' => []
                ];
            }

            $experiences[$needle]['options'][] = $opt;
        }

        return view('booking.request', compact('experiences', 'type', 'days'));
    }

    public function saveBookingOptions(Request $request)
    {
        $isIndividual = $request->has('book-individual');
        $res = Reservation::find(session('reservation_id'));

        if ($isIndividual) {
            $request->validate([
                'option.*' => [
                    'required',
                    'distinct',
                    'exists:dining_options,id',
                ],
            ]);

            $options = DiningOption::find($request->input('option.*'));

            $guests = [];
            foreach ($options as $opt) {
                $guests[] = [
                    'name' => $res->name,
                    'country' => $res->country,
                    'reservation_id' => $res->id,
                    'dining_option_id' => $opt->id,
                ];
            }

            Guest::insert($guests);
        } else {
            // Group booking

            $guest_info = collect();

            foreach ($request->input('option') as $option_id => $entries) {
                foreach ($entries as $entry) {
                    if (empty($entry['country'])) continue;

                    $guest_info->push([
                        'country' => $entry['country'],
                        'name' => $entry['name'] ?? '(Unknown)',
                        'dining_option_id' => $option_id,
                    ]);
                }
            }

            $options = DiningOption::find($guest_info->map(function ($el) {return $el['dining_option_id'];}));
            $errors = [];

            foreach ($options as $opt) {
                $filtered = $guest_info->filter(function($el) use ($opt) {return $opt->id === $el['dining_option_id'];});
                $country_counts = [];

                foreach ($guest_info as $guest) {
                    if (!array_key_exists($guest['country'], $country_counts)) $country_counts[$guest['country']] = 0;

                    $country_counts[$guest['country']]++;
                }

                foreach ($country_counts as $country => $count) {
                    $max = $opt->availableForCountry($country);

                    if ($count > $max) {
                        $errors[$opt->id] = "Too many guests ($count) from country {$country} on {$opt->diningExperience->name} at {$opt->day->name}: {$opt->time}! Maximum allowed for that country is $max.";
                    }
                }
            }

            if (empty($errors)) {
                // Can save

                $guests = [];
                foreach ($guest_info as $guest) {
                    $guests[] = [
                        'name' => $guest['name'],
                        'country' => $guest['country'],
                        'reservation_id' => $res->id,
                        'dining_option_id' => $guest['dining_option_id'],
                    ];
                }

                Guest::insert($guests);
            } else {
                // TODO?
                $request->flash();

                return $this->getBookingOptions($request)->withErrors($errors);
            }
        }

        return redirect()->route('booking.confirmation');
    }

    public function bookingConfirmation(Request $request)
    {
        return view('booking.confirmation', ['res' => Reservation::find(session('reservation_id'))]);
    }
}
