@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-teal-50 via-white to-amber-50 dark:from-slate-900 dark:via-slate-800 dark:to-slate-900 py-12 px-4">
    <div class="max-w-2xl mx-auto">
        
        @if(session('status'))
            <div class="mb-6 p-4 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-lg">
                <p class="text-green-800 dark:text-green-200 font-medium">{{ session('status') }}</p>
            </div>
        @endif

        @if(session('error') || $error)
            <div class="mb-6 p-4 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-lg">
                <p class="text-red-800 dark:text-red-200 font-medium">{{ session('error') ?? $error }}</p>
            </div>
        @endif

        <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-xl overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-teal-600 to-amber-500 px-6 py-8 text-center">
                <h1 class="text-2xl sm:text-3xl font-bold text-white mb-2">
                    ALG 2025 - Attendance Verification
                </h1>
                <p class="text-teal-50">Africa Champions Breakfast</p>
            </div>

            <!-- Content -->
            <div class="p-6 sm:p-8">
                @if($reservation)
                    <div class="text-center mb-8">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-green-100 dark:bg-green-900/30 rounded-full mb-4">
                            <svg class="w-8 h-8 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">
                            Valid QR Code
                        </h2>
                        <p class="text-gray-600 dark:text-gray-300">
                            Welcome to ALG 2025!
                        </p>
                    </div>

                    <!-- Attendee Details -->
                    <div class="bg-gray-50 dark:bg-slate-700/50 rounded-xl p-6 mb-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Attendee Information</h3>
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="text-gray-600 dark:text-gray-400">Name:</span>
                                <span class="font-semibold text-gray-900 dark:text-white">{{ $reservation->full_name }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600 dark:text-gray-400">Email:</span>
                                <span class="font-medium text-gray-900 dark:text-white">{{ $reservation->email }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600 dark:text-gray-400">Fellowship:</span>
                                <span class="inline-flex px-3 py-1 bg-amber-100 dark:bg-amber-900/30 text-amber-800 dark:text-amber-200 rounded-full text-sm font-medium">
                                    {{ $reservation->fellowship }}
                                </span>
                            </div>
                            @if($reservation->attendance_mode)
                                <div class="flex justify-between">
                                    <span class="text-gray-600 dark:text-gray-400">Status:</span>
                                    <span class="inline-flex px-3 py-1 bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-200 rounded-full text-sm font-medium">
                                        ✓ Checked In
                                    </span>
                                </div>
                            @endif
                        </div>
                    </div>

                    @if(!$reservation->attendance_mode)
                        <!-- Check-in Button -->
                        <form method="POST" action="{{ route('attendance.mark-present', ['token' => $reservation->attendance_token]) }}">
                            @csrf
                            <button type="submit" class="w-full bg-gradient-to-r from-teal-600 to-amber-500 text-white font-semibold py-4 px-6 rounded-xl hover:from-teal-700 hover:to-amber-600 transition-all duration-200 shadow-lg hover:shadow-xl">
                                ✓ Confirm Attendance
                            </button>
                        </form>
                    @else
                        <div class="text-center p-6 bg-green-50 dark:bg-green-900/20 rounded-xl">
                            <p class="text-green-800 dark:text-green-200 font-medium">
                                This attendee has already been checked in.
                            </p>
                            <p class="text-sm text-green-600 dark:text-green-300 mt-2">
                                Check-in time: {{ $reservation->updated_at->format('M d, Y - h:i A') }}
                            </p>
                        </div>
                    @endif
                @else
                    <div class="text-center py-8">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-red-100 dark:bg-red-900/30 rounded-full mb-4">
                            <svg class="w-8 h-8 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">
                            Invalid QR Code
                        </h2>
                        <p class="text-gray-600 dark:text-gray-300">
                            This QR code is not valid or has expired.
                        </p>
                    </div>
                @endif
            </div>

            <!-- Footer -->
            <div class="bg-gray-50 dark:bg-slate-700/50 px-6 py-4 text-center border-t border-gray-200 dark:border-slate-600">
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    <strong>LéO Africa Institute</strong> • ALG 2025<br>
                    Saturday, 13th December 2025
                </p>
            </div>
        </div>

    </div>
</div>
@endsection
