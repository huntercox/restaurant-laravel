<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'discount',
        'expiry_date',
    ];

    public function calculateDiscount($subTotal)
    {
      // Divide the discount by 100 to convert it from an integer representation to a percentage
      $discountRate = $this->discount / 100;

      // Multiply the discount rate by the subTotal to calculate the actual discount amount
      return $discountRate * $subTotal;
    }
}
