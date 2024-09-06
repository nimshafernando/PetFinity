<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment; // Ensure you're using your Appointment model
use Stripe\StripeClient;

class StripeController extends Controller
{
    // Phase 1: Stripe Payment Initialization
    public function stripe(Request $request)
    {
        $stripe = new StripeClient(config('stripe.stripe_sk'));

        // Create Stripe checkout session
        $response = $stripe->checkout->sessions->create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'lkr', // LKR for Sri Lanka
                        'product_data' => [
                            'name' => 'Please Pay',
                            'description' => "Pet Boarding Center: {$request->boarding_center}",
                        ],
                        'unit_amount' => $request->price * 100, // Amount in cents
                    ],
                    'quantity' => $request->quantity,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('success') . '?session_id={CHECKOUT_SESSION_ID}&id=' . $request->id,
            'cancel_url' => route('cancel'),
        ]);

        // Redirect to Stripe checkout page
        return redirect($response->url);
    }

    // Phase 2: Stripe Payment Success Handling
    public function success(Request $request)
    {
        // Initialize Stripe client
        $stripe = new StripeClient(config('stripe.stripe_sk'));
        $session = $stripe->checkout->sessions->retrieve($request->session_id);

        // Get the appointment by ID (from the request)
        $appointment = Appointment::findOrFail($request->id);

        // Update the appointment's payment status
        $appointment->update([
            'payment_method' => 'card',
            'payment_status' => 'paid',
        ]);

        return view('success', ['metadata' => $session->metadata]);
    }

    public function cancel()
    {
        return redirect()->route('pet-owner.dashboard')->with('message', 'Payment was cancelled.');
    }
}
