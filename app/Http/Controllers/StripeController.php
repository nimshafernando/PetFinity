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
                            'name' => 'Please Pay', // General prompt for payment
                            'description' => "Pet Boarding Center: {$request->boarding_center}",
    
                                             
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
                'pet_name' => $request->pet_name,
                'check_in' => $request->check_in,
                'check_out' => $request->check_out,
                'boarding_center' => $request->boarding_center,
                'profile_pic' => $request->profile_pic_url,
                'owner_first_name' => $request->owner_first_name,
                'owner_last_name' => $request->owner_last_name,
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
        $metadata = $session->metadata;

        return view('success', compact('metadata'));
    }

    public function cancel()
{
    return redirect()->route('pet-owner.dashboard')->with('message', 'Payment was cancelled. You have been redirected back to the dashboard.');
}

}
