<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Option extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'description',
      'price',
      'category_id',
    ];

    /**
     * Get all items that are assigned this option.
     */
    public function items(): MorphToMany
    {
      return $this->morphedByMany(Item::class, 'optionable')->withPivot('option_category_id');
    }

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
      return $this->belongsTo(OptionCategory::class);
    }

}
