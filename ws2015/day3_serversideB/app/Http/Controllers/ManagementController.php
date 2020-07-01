<?php

namespace App\Http\Controllers;

use App\Guest;
use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;

class ManagementController extends Controller
{
    public function getReservations(Request $request)
    {
        $statuses = [
            'confirmed' => 1,
            'requested' => 2,
            'waitlisted' => 3,
            'declined' => 4,
            'reschedule' => 5,
        ];

        return view('management.index', ['guests' => Guest::all()
            ->sortBy('id')
            ->sortBy(function($el, $key) use ($statuses) {
                return $statuses[$el->status];
            })
            ->sortBy(function($el, $key) {
                return $el->diningOption->day->date;
            })
        ]);
    }

    public function handleManagementPost(Request $request)
    {
        // Check special cases
        if ($request->has('send-emails')) {
            return $this->sendEmail($request);
        } else if ($request->has('create-guest-list')) {
            return $this->createGuestList($request);
        }

        return $this->saveReservations($request);
    }

    public function createGuestList(Request $request)
    {
        $firstRow = 'Booking No;Booking Contact Name;Booking Contact Organization;Guest Name;Guest Country';

        $rows = Guest::where('status', 'confirmed')->get()
            ->sortBy(function($el, $key) {
                return $el->reservation->id;
            })
            ->sortBy(function($el, $key) {
                return $el->diningOption->id;
            })
            ->sortBy(function($el, $key) {
                return $el->diningOption->day->date;
            })
            ->map(function ($guest) {
                return implode(';', [
                    "#{$guest->reservation->id}",
                    $guest->reservation->name,
                    $guest->reservation->organization,
                    $guest->name,
                    $guest->country,
                ]);
            })
            ->prepend($firstRow)
            ->toArray();

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="guestlist.csv"',
        ];

        return Response::make(implode("\n", $rows), 200, $headers);
    }

    public function saveReservations(Request $request)
    {
        $statuses = $request->input('status');

        foreach($statuses as $id => $status) {
            Guest::whereId($id)->update(['status' => $status]);
        }

        return redirect()->route('management');
    }

    public function sendEmail(Request $request)
    {
        $reservations = Reservation::find(Guest::whereNotIn('status', ['confirmed', 'declined'])->pluck('reservation_id'));

        foreach($reservations as $res) {
            $mail = View::make('management.email', compact('res'));
            $text = $mail->render();

            file_put_contents(base_path() . "/emails/email-no{$res->id}.txt", $text);
        }

        return redirect()->route('management');
    }
}
