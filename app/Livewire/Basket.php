<?php

namespace App\Livewire;


use App\Models\BasketItem;
use App\Models\Basket as BasketModel;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Basket extends Component
{
    public $baskets;
      public $basket;
     
     public $basketItems = [];
     public $basketName = 'default';
     public function mount()
{
    $this->baskets = BasketModel::where('user_id', Auth::id())->get(); // returns Collection of models
}
    public function getBasketsProperty()
{
    return BasketModel::where('user_id', Auth::id())->get();
}
    public function render()
    {
        return view('livewire.basket', [
            'items' => Item::all(),
            'baskets' => $this->getBasketsProperty(),
        ]);
    }

    public function createBasket(){
        

        $this->validate([
        'basketName' => 'nullable|string|max:255',
     ]);

        $this->basket = BasketModel::create(
    [
        'name' => $this->basketName ?? 'default',
        'user_id' => Auth::id(),
    ]
);

        $this->basketItems = $this->basket->items()->with('item')->get();
    }

    public function addToBasket($itemId, $quantity = 1){

    if (! $this->basket) {
            $this->createBasket(); // ensure basket exists
        }

      $basketItem = BasketItem::firstOrCreate([
        'basket_id' => $this->basket->id,
        'item_id' => $itemId,
      ], [
        'quantity' => $quantity,
      ]);
       

        if(! $basketItem->wasRecentlyCreated){
            $basketItem->increment('quantity', $quantity);
        }

        $this->basketItems = $this->basket->items()->with('item')->get();
        
   }
}
