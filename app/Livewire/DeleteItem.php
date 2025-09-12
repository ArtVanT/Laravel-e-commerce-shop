<?php

namespace App\Livewire;

use App\Models\Item;
use Livewire\Component;

class DeleteItem extends Component
{
    public function render()
    {
        return <<<'HTML'
            <div>
                <h2>Delete Item</h2>
                <form wire:submit.prevent="deleteItem">
                    <input type="hidden" wire:model="itemId">
                    <p>Are you sure you want to delete this item?</p>
                    <button type="submit">Delete</button>
                </form>
            </div>
        HTML;
    }
    public function destroyItem($itemId)
    {
        $item = Item::find($itemId);
        if ($item) {
            $item->delete();
            session()->flash('message', 'Item deleted successfully.');
        } else {
            session()->flash('error', 'Item not found.');
        }
    }
}
