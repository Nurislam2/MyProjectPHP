<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function index()
    {
        return view("index");
    }

    public function checkout()
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));
        $session = \Stripe\Checkout\Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'kgs',
                        'product_data' => [
                            'name' => 'Send me money?',
                        ],
                        'unit_amount' => 5000,
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('patient.appointment'),
            'cancel_url' => route('patient.appointment'),
        ]);
        return redirect()->away($session->url);
    }

    public function success()
    {
        return view("index");
    }
}
