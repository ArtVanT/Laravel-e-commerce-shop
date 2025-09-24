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
    public $basketName;

    public BasketModel $basket;
    public $item;
    public $itemId;
    public $message;

    public $itemPrice;
    public function mount(int $itemId)
    {
        $this->baskets = BasketModel::with('items')->where('user_id', Auth::id())->get();
         $this->itemId = $itemId;
         $this->item = Item::findOrFail($itemId);
         

         
         
    }

       public function hydrate()
    {
        if (!$this->item && $this->itemId) {
            $this->item = Item::find($this->itemId);
        }
    }

    public function render()
    {
        return view('livewire.basket');
    }

    public function createBasket(){

        $validated = $this->validate([
            'basketName' => 'required|string|max:255',
        ]);
        
        if(!Auth::check()){
            $this->message = "You need to be logged in to create a basket.";
            return;
        }
            $basket = BasketModel::firstOrCreate([
                'name'=> $validated['basketName'],
                'user_id' => Auth::id(),
            ]);

            $this->message = "Basket '{$basket->name}' created successfully!";
            $this->baskets = BasketModel::where('user_id', Auth::id())->get();

    }

    public function AddItem(int $basketId){

       if (! Auth::check()) {
        $this->message = "You need to log in to add items.";
        return;
    }
    $basket = BasketModel::where("id", $basketId)->where("user_id", Auth::id())->firstOrFail();
    if (!$basket) {
        $this->message = "Basket not found or you do not have permission to modify it.";
        return;
    }

    $basket->items()->syncWithoutDetaching([$this->itemId => ['quantity' => 1,
    'price_at_time' => $this->item->item_price,
]
    
]);

$this->message = "Item added to basket '{$basket->name}'!";
    $this->baskets = BasketModel::with('items')->where('user_id', Auth::id())->get();

}

public function deleteBasket($id){
$basket = BasketModel::where('id', $id)->where('user_id', Auth::id())->first();
$basket->delete();
$this->baskets = BasketModel::with('items')
        ->where('user_id', Auth::id())
        ->get();

    $this->message = 'Basket deleted successfully!';

}

public function totalSum($basketId){

    // $basket = $this->baskets->firstWhere('id', $basketId);
    // $total = 0; 
    // if($basket){
    // foreach($this->baskets as $basket){
    //          foreach($basket->items as $item){
    //     $total += $item->pivot->quantity * $item->pivot->price_at_time;
        
    //     }
    // }
      
    // }
    // return $total;

 return  BasketItem::where('basket_id', $basketId)
        ->selectRaw('SUM(quantity * price_at_time) as total_sum')
        ->value('total_sum') ?? 0;
}

}