<?php

namespace App\Http\Controllers;

use App\DiningExperience;
use App\DiningOption;
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

        return redirect()->route('booking.request');
    }

    public function getBookingOptions(Request $request)
    {
        $options = DiningOption::all();
        $type = Reservation::where('id', session('reservation_id'))->pluck('type')->get(0);

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

        return view('booking.request', compact('experiences', 'type'));
    }

    public function saveBookingOptions(Request $request)
    {
        $options = [];

        foreach ($request->all() as $var) {
            preg_match('#^option-([0-9]+)$#', $var, $matches);
            if ($matches) {
                $options[] = $matches[1];
            }
        }



        return redirect()->route('booking.confirmation');
    }

    public function bookingConfirmation(Request $request)
    {
        return view('booking.confirmation');
    }
}
