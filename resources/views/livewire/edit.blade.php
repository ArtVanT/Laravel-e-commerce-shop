<div>
    {{-- In work, do what you enjoy. --}}
       <main class="flex gap-5 flex-col justify-center items-center pt-5">
        <h1 class="text-2xl text-mono font-bold text-cyan-500">Add a file to your item-list</h1>

        <form wire:submit.prevent="updateItem" 
            class="flex flex-col gap-5 p-5 justify-center items-start bg-none w-xs rounded-xl">

            

            <label for="item_name">Item name</label>
            <input type="text" name="item_name" id="" class="font-mono text-slate-600" placeholder="enter your item's name" wire:model="updateItemName">

            <label for="item_desc">enter your description here</label>
            <textarea name="item_description" class="h-48 w-72 font-mono text-slate-600" placeholder="your description" wire:model="updateItemDescription"></textarea>

            <label for="item_num">remains of item</label>
            <input type="number" name="item_num" id="" class="font-mono text-slate-600" placeholder="enter your item's number" wire:model="updateItemNum">

            <label for="item_price">the price of item</label>
            <input type="number" name="item_price" id="" class="font-mono text-slate-600" placeholder="enter your item's price" wire:model="itemPrice">

            <label for="item_pic">the picture of item</label>
            <input type="file" name="item_pic" id="" accept="image/*" class="text-sm max-w-1/3" wire:model="updateItemImage">
            <button type="submit"
                class="font-mono font-bold text-lg px-5 py-0.5 text-accent-foreground rounded-lg bg-red-700">Add
                Item</button>
        </form>

    </main>
</div>
