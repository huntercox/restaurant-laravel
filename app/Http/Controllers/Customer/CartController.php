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
        $item = $request->input('items');
        $user = Auth::user();

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

        $user->cartItems()->create([
            'item_id'  => $item['id'],
            'quantity' => $item['quantity'],
            'price'    => $item['price'],
        ]);

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
