<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;

class NewsletterSubscriptionController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $data = $request->only('email');

        $validator = Validator::make($data, [
            'email' => ['required', 'email', 'max:255'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'ok' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        $email = strtolower(trim($data['email']));

        $sub = NewsletterSubscription::firstOrCreate(
            ['email' => $email],
            [
                'source' => 'footer',
                'ip_address' => $request->ip(),
                'user_agent' => (string) $request->header('User-Agent'),
            ]
        );

        return response()->json([
            'ok' => true,
            'message' => 'Subscribed',
            'id' => $sub->id,
        ]);
    }
}
