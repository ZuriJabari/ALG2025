<?php
namespace App\Http\Controllers;

use App\Mail\SeatReservationReceived;
use App\Models\SeatReservation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\StreamedResponse;

class SeatReservationController extends Controller
{
    public function create()
    {
        return view('pages.reserve-seat');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'full_name' => ['required','string','max:255'],
            'sector' => ['required','in:Media,Public/Government,Corporate,Business,Civil Society'],
            'email' => ['required','email','max:255'],
            'phone' => ['nullable','string','max:40'],
        ]);

        $reservation = SeatReservation::create($data);

        // Send acknowledgement email (non-fatal if mail transport is unavailable)
        try {
            Mail::to($reservation->email)->send(new SeatReservationReceived($reservation->full_name));
            $message = 'Reservation received. Please check your email.';
        } catch (\Throwable $e) {
            \Log::warning('Seat reservation mail failed: '.$e->getMessage());
            $message = 'Reservation received. Our confirmation email could not be sent right now.';
        }

        return back()->with('status', $message);
    }

    public function exportCsv(): StreamedResponse
    {
        $fileName = 'seat-reservations-'.now()->format('Ymd_His').'.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$fileName\"",
        ];

        $callback = function() {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['ID','Full Name','Sector','Email','Phone','Created At']);
            SeatReservation::orderByDesc('id')->chunk(500, function($rows) use ($handle) {
                foreach ($rows as $r) {
                    fputcsv($handle, [$r->id, $r->full_name, $r->sector, $r->email, $r->phone, $r->created_at]);
                }
            });
            fclose($handle);
        };

        return response()->stream($callback, 200, $headers);
    }
}
