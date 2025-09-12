<?php

namespace App\Models;

use App\Models\BasketItem;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Basket extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    // protected $table = 'ecombaskets';
    protected $fillable = ['name', 'user_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
     /**
     * Get all items in this basket.
     */
    public function items(): HasMany
    {
        return $this->hasMany(BasketItem::class, 'basket_id');
    }
    
    /**
     * Get the total price of the basket.
     */
    public function getTotalAttribute(): float
    {
        return $this->items->sum(function ($item) {
            return $item->quantity * $item->price_at_time;
        });
    }
    
    /**
     * Get the total number of items in the basket.
     */
    public function getItemsCountAttribute(): int
    {
        return $this->items->sum('quantity');
    }
}
