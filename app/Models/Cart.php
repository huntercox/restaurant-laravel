<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperCart
 */
class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'coupon_id',
        'sub_total',
        'total',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
    public function scopeOld($query)
    {
        $twoMinutesAgo = now()->subHours(2);
        return $query->where('updated_at', '<', $twoMinutesAgo);
    }

  // In the Cart model
  public function calculate() {

    $this->loadMissing(['cartItems.item']);
    // Iterate through the cart items and sum the product of price and quantity
    $sub_total = $this->cartItems->sum(function (CartItem $cartItem) { return $cartItem->item->price * $cartItem->quantity; });


    dd($sub_total);

    // If there's a coupon_id, you might want to apply a discount based on the coupon
    $discount = 0;
    if ($this->coupon_id) {
      $coupon = Coupon::find($this->coupon_id);
      // Assuming you have a method on the Coupon model to calculate the discount
      $discount = $coupon->calculateDiscount($sub_total);
    }

    // Calculate the total after discount
    $total = $sub_total - $discount;

    // Update the sub_total and total_price fields
    $this->update([
      'sub_total' => $sub_total,
      'total' => $total,
    ]);
  }

}
