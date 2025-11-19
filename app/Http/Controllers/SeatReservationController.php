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
            'is_fellow' => ['required','in:0,1'],
            'fellowship' => ['nullable','in:YELP,HUDUMA,The Griot Fellowship,KAS Network,Africa Champions Invite,Member of Faculty,Board/Management,Partner/Affiliate'],
        ]);

        // Conditional requirement: fellowship when is_fellow=1
        if (($data['is_fellow'] ?? '0') === '1' && empty($data['fellowship'])) {
            return back()->withErrors(['fellowship' => 'Please select your fellowship.'])->withInput();
        }

        // Normalize types
        $data['is_fellow'] = (bool) ((int)($data['is_fellow'] ?? 0));

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
            fputcsv($handle, ['ID','Full Name','Sector','Email','Phone','Is Fellow','Fellowship','Created At']);
            SeatReservation::orderByDesc('id')->chunk(500, function($rows) use ($handle) {
                foreach ($rows as $r) {
                    fputcsv($handle, [
                        $r->id,
                        $r->full_name,
                        $r->sector,
                        $r->email,
                        $r->phone,
                        $r->is_fellow ? 'Yes' : 'No',
                        $r->fellowship,
                        $r->created_at,
                    ]);
                }
            });
            fclose($handle);
        };

        return response()->stream($callback, 200, $headers);
    }
}
