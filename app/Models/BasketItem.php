<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BasketItem extends Model
{
    protected $table = 'basket_items';
    
    protected $fillable = [
        'ecombasket_id',
        'item_id',
        'quantity',
        'price_at_time'
    ];
    
    protected $casts = [
        'price_at_time' => 'decimal:2',
        'quantity' => 'integer'
    ];
    
    /**
     * Get the basket that owns this item.
     */
    public function basket(): BelongsTo
    {
        return $this->belongsTo(Basket::class, 'basket_id');
    }
    
    /**
     * Get the item details.
     */
    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }
    
    /**
     * Get the total price for this line item.
     */
    public function getTotalAttribute(): float
    {
        return $this->quantity * $this->price_at_time;
    }
}
