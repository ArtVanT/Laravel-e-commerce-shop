<?php

namespace App\Livewire;

use App\Models\Item;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    public Item $item;

    #[Title('Edit Item')]
    public function render()
    {
        return view('livewire.edit');
    }
    #[Validate('required|string|max:255')]
    public $updateItemName = '';

    #[Validate('required|string|max:1000')]
    public $updateItemDescription = '';

    #[Validate('nullable|file|max:10240|mimes:jpg,jpeg,png,gif,svg,webp')]
    public $updateItemImage;

    #[Validate('required|integer|min:0')]
    public $itemPrice = 0;
    #[Validate('required|integer|min:0')]
    public $updateItemNum = 0;

    public function mount(Item $item){
        $this->item = $item;
        $this->updateItemName = $item->item_name;
        $this->updateItemDescription = $item->item_description;
        $this->itemPrice = $item->item_price;
        $this->updateItemNum = $item->item_num;
    }
    public function updateItem()
    {
        // Logic to update the item goes here
        if (!Auth::check()) {
            abort(403, 'Unauthorized');
        }
        $this->validate();
        $item = $this->item;

        $data = [
            'item_name' => $this->updateItemName,
            'item_description' => $this->updateItemDescription,
            'item_price' => $this->itemPrice,
        ];
        if ($this->updateItemImage) {
            $data['item_pic'] = $this->updateItemImage->store('items', 'public');
        }
          $item->update($data);
        return redirect()->route('home')->with('message', 'Item updated successfully!');
    }
}
