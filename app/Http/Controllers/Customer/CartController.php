<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Menu;
use Illuminate\Http\Request;
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
        $item = $request->input('item');
        $user = $request->user();

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
