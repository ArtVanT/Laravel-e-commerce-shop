<div class="w-fit h-fit flex flex-col p-4 bg-amber-100 rounded-md gap-4">
    <div class="font-extra-bold text-slate-900 text-5xl cursor-pointer flex justify-end" @click="toggleBtn">X</div>
    <form  class="flex" wire:submit.prevent.live="createBasket">
    <input type="text" wire:model="basketName" class="w-full h-10 border border-gray-300 rounded-l-md px-3 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter cart name">
    <button type="submit" class="bg-blue-500 text-white px-4 rounded-r-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Save</button>
    </form>

    <div class="flex flex-col items-center gap-3 w-full h-full border-b-amber-1000 border-b p-2"></div>
    @foreach($baskets as $basket)
    <div class="flex items-center gap-3 w-full h-full border-b-amber-1000 border-b p-2">

<a href="#" class="inline-flex pt-4 text-2xl font-mono font-extrabold text-slate-950">{{ $basket->name }}</a>

<button wire:click.prevent="AddItem({{ $basket->id }})" class="inline-flex justify-center items-center !h-10 w-10 bg-green-500 rounded-md p-2 text-white font-mono font-bold">+</button>
<button wire:click.prevent="deleteBasket({{ $basket->id }})" class="inline-flex justify-center items-center !h-10 w-10 bg-red-500 rounded-md p-2 text-white font-mono font-bold">X</button>
</div>
 
 <table class="w-fit">
    <thead>
        <tr class="bg-gray-200 flex"> 
            <th class="inline-flex px-4">name</th>
            <th class="inline-flex px-4">quantity</th>
            <th class="inline-flex px-4">price</th>
            </tr>
</thead>
@foreach($basket->items as $item)
<tbody>
        <tr class="flex justify-between">
           <th class="pl-2"> <span class="font-mono text-lg">{{ $item->item_name }}</span></th>
            <th class=""><span class="font-mono text-lg">{{ $item->pivot->quantity }}</span></th>
            <th class=""><span class="font-mono text-lg">{{ number_format($item->pivot->price_at_time, 2) }}</span></th>
            <!-- <th class=""><span class="font-mono text-lg">{{  number_format($this->totalSum($basket->id), 2) }}</span></th> -->
            
        </tr>
</tbody>
@endforeach
        </table>
         <div class=""><span class="font-mono font-extrabold text-lg text-slate-950">Total sum: {{ number_format($this->totalSum($basket->id), 2) }}</span></div>
    @endforeach
</div>


