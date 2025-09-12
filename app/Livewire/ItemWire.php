<?php

namespace App\Livewire;

use App\Models\Basket;
use App\Models\BasketItem;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ItemWire extends Component
{
    
    public function render()
    {
        $items = Item::all();
        return view('livewire.item-wire', [
        'items' => $items
    ]);
    }
}
