<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Support\Inertia;
use Inertia\Response;

class CheckoutController extends Controller
{
    public function __invoke(): Response
    {
        $cartItems = Cart::with('items')->get();
        return Inertia::render('Checkout', [
            'cartItems' => $cartItems
        ]);
    }
}
