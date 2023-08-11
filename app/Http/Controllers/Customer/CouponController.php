<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CouponController extends Controller
{
  public function apply(Request $request)
  {
    $code = $request->input('code');
    $coupon = Coupon::where('code', $code)->first();

    if (!$coupon) {
      return response()->json(['message' => 'Invalid coupon code'], 400);
    }

    // Find the user's cart or the guest user's cart
    $user = $request->user();
    if (!$user) {
      $guestUserId = Session::get('guest_user_id');
      if (!$guestUserId) {
        return response()->json(['message' => 'No user or guest user found'], 400);
      }
      $user = User::find($guestUserId);
    }

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

}
