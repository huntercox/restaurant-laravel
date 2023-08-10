<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function apply(Request $request)
    {
        $code = $request->input('code');
        $coupon = Coupon::where('code', $code)->first();

        if ($coupon) {
            // Apply the discount to the cart
            $discount = $coupon->discount;
            // You can use a service or another approach to update the cart subtotal
            return redirect()->route('checkout')->with('discount', $discount);
        }

        return response()->json(['message' => 'Invalid coupon code'], 400);
    }
}
