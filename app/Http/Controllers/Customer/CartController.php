<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $item = $request->all();
        $user = $request->user();

        if (!$user) {
            $guestUserId = Session::get('guest_user_id');

            if ($guestUserId) {
                // If there's a guest user ID in the session, retrieve it
                $user = User::find($guestUserId);
            } else {
                // Otherwise, create a new guest user and store their ID in the session
                $user = User::create([
                    // You might want to indicate that this user is a guest, for example:
                    'name' => 'John Doe',
                    'email' => 'johndoe@example.com',
                    'password' => 'johndoe@example.com',
                    'is_guest' => true,
                    // Include any other necessary fields, or defaults for those fields
                ]);
                Session::put('guest_user_id', $user->id);
            }
        }

        // Check if a cart already exists for the user
        $cart = $user->cart()->first();
        if (!$cart) {
            // Create a new cart if none exists
            $cart = $user->cart()->create([
                'user_id' => $user->id,
            ]);
        }

        // Check if the item is already in the cart
        $cartItem = $user->cartItems()->where('item_id', $item['id'])->first();
        if ($cartItem) {
            // If the item is already in the cart, increment the quantity
            $cartItem->increment('quantity');
        } else {
            // Otherwise, create a new cart item
            $user->cartItems()->create([
                'item_id' => $item['id'],
                'quantity' => 1,
                'price' => $item['price'],
                'cart_id' => $cart->id,
            ]);
        }

        return redirect()->back()->with('message', 'Cart updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }
}
