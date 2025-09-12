<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BasketItem;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends Model
{
    //
    protected $fillable = ['item_name', 'item_description', 'item_num', 'item_price', 'item_pic'];

    public function getRouteKeyName(): string
{
    return 'slug';
}

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
     public function basketItems(): HasMany
    {
        return $this->hasMany(BasketItem::class);
    }
}
