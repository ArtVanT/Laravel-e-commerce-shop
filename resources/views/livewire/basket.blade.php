<div class="-translate-y-40 w-2xs bg-white p-4 shadow-lg shadow-gray-400">

<form wire:submit.prevent="createBasket">
   <input type="text" name="basket_name" id="" wire:model="basketName" class="border border-gray-300 rounded-md p-2 w-full" placeholder="Basket Name">
   <button type="submit" class="bg-blue-500 text-white rounded-md p-2 mt-2 w-full">Create Basket</button>

   </form>
   @foreach($baskets as $basket)
   <div class="flex gap-3 p-4">
   
     <a href="#" class="font-mono inline-flex text-xl text-extrabold text-slate-950">{{ $basket->name }}</a>
    <button wire:click="addToBasket({{ $basket->id }})" class="bg-green-500 text-white rounded-md px-3 py-1">+</button>
    <button wire:click="deleteBasket({{ $basket->id }})" class="bg-red-500 text-white rounded-md px-3 py-1">X</button>
    </div>
   @endforeach
</div>
