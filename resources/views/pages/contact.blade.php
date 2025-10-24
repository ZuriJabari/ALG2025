@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Contact
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-4">Contact</h1>
                    <p class="text-gray-700 mb-4">Have a question? Reach out to us.</p>
                    <ul class="text-gray-700 space-y-1">
                        <li>Email: <a href="mailto:hello@example.com" class="text-indigo-600">hello@example.com</a></li>
                        <li>Twitter: <a href="#" class="text-indigo-600">@yourhandle</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
