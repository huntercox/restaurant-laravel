<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
    ];

    public function menus(): BelongsToMany
    {
        return $this->belongsToMany(Menu::class, 'menu_items');
    }
    public function carts(): BelongsToMany
    {
        return $this->belongsToMany(Cart::class, 'cart_items');
    }

  /**
   * Get all options for the item.
   */
  public function options(): MorphToMany
  {
    return $this->morphToMany(Option::class, 'optionable')
      ->withPivot('option_category_id')
      ->with('category');
  }
}
