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
        // Find the user's cart
        $user = $request->user();
        $cart = $user->cart;

        if (!$cart) {
          return response()->json(['message' => 'No cart found'], 400);
        }

        // Apply the coupon to the cart
        $cart->update(['coupon_id' => $coupon->id]);

        // Calculate the new sub_total and total_price
        $cart->calculate();

        return redirect()->route('checkout')->with('message', 'Coupon applied successfully');
      }

        return response()->json(['message' => 'Invalid coupon code'], 400);
    }

}
