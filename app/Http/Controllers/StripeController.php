<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\StripeClient;

class StripeController extends Controller
{
    public function stripe(Request $request)
    {
        $stripe = new StripeClient(config('stripe.stripe_sk'));
        $response = $stripe->checkout->sessions->create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'lkr', // Set currency to LKR
                        'product_data' => [
                            'name' => $request->product_name,
                        ],
                        'unit_amount' => $request->price * 100, // Convert price to cents (smallest currency unit)
                    ],
                    'quantity' => $request->quantity,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('cancel'), // Redirect to cancel method if payment is cancelled
            'metadata' => [
                'appointment_details' => json_encode([
                    'pet_name' => $request->pet_name,
                    'check_in' => $request->check_in,
                    'check_out' => $request->check_out,
                    'boarding_center' => $request->boarding_center,
                    'profile_pic' => $request->profile_pic_url,
                ]),
            ],
        ]);

        if (isset($response->id) && $response->id != '') {
            session()->put('product_name', $request->product_name);
            session()->put('quantity', $request->quantity);
            session()->put('price', $request->price);

            return redirect($response->url);
        } else {
            return redirect()->route('cancel');
        }
    }

    public function success(Request $request)
    {
        $stripe = new StripeClient(config('stripe.stripe_sk'));
        $session = $stripe->checkout->sessions->retrieve($request->session_id);
        $metadata = json_decode($session->metadata->appointment_details, true);

        // Pass the metadata to your view to display the appointment details and profile pic
        return view('success', compact('metadata'));
    }

    public function cancel()
    {
        // Redirect the user back to the dashboard
        return redirect()->route('Dashboard')->with('message', 'Payment was cancelled. You have been redirected back to the dashboard.');
    }
}
