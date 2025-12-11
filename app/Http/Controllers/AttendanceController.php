<?php

namespace App\Http\Controllers;

use App\Models\SeatReservation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AttendanceController extends Controller
{
    public function show(Request $request): View
    {
        $token = $request->query('t');

        $reservation = null;
        if ($token) {
            $reservation = SeatReservation::where('attendance_token', $token)->first();
        }

        return view('pages.alg-2025-attendance', [
            'reservation' => $reservation,
            'token' => $token,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'token' => ['required', 'string'],
            'attendance_mode' => ['required', 'in:physical,virtual'],
        ]);

        $reservation = SeatReservation::where('attendance_token', $data['token'])->first();

        if (! $reservation) {
            return redirect()
                ->route('attendance.show', ['t' => $data['token']])
                ->with('error', 'This attendance confirmation link is invalid or has expired.');
        }

        $reservation->attendance_mode = $data['attendance_mode'];
        $reservation->save();

        $message = $data['attendance_mode'] === 'physical'
            ? 'Thank you. We have recorded that you will attend ALG 2025 in person.'
            : 'Thank you. We have recorded that you will join ALG 2025 virtually.';

        return redirect()
            ->route('attendance.show', ['t' => $data['token']])
            ->with('status', $message);
    }

    public function verify(Request $request, string $token): View
    {
        $reservation = SeatReservation::where('attendance_token', $token)->first();

        if (!$reservation) {
            return view('pages.attendance-verify', [
                'reservation' => null,
                'error' => 'Invalid QR code or attendance token.',
            ]);
        }

        return view('pages.attendance-verify', [
            'reservation' => $reservation,
            'error' => null,
        ]);
    }

    public function markPresent(Request $request, string $token): RedirectResponse
    {
        $reservation = SeatReservation::where('attendance_token', $token)->first();

        if (!$reservation) {
            return redirect()->route('attendance.verify', ['token' => $token])
                ->with('error', 'Invalid attendance token.');
        }

        // Mark as present
        $reservation->update([
            'attendance_mode' => 'physical',
        ]);

        return redirect()->route('attendance.verify', ['token' => $token])
            ->with('status', 'Attendance confirmed! Welcome to ALG 2025.');
    }
}
