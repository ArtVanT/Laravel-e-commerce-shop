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
    public Item $item;
    public $itemPrice;

    public function mount(int $itemId)
    {
        $this->item = Item::findOrFail($itemId);
        $this->itemPrice = $this->item->item_price;
    }
    public function render()
    {
        
    return view('livewire.item-wire', [
        'item' => $this->item,   // the item from mount()
        'items' => Item::all(),  // optional, if you actually need the list
    ]);
    }
}
