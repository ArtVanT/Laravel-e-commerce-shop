<!-- The whole future lies in uncertainty: live immediately. - Seneca -->




<a href="{{ route('items.show', ['item' => $item->item_name]) }}" class="inline-flex flex-col gap-3">
        <div class="item__single flex justify-center flex-col w-2xs bg-gray-100 rounded-lg p-5 h-full hover:scale-120 hover:border-4 hover:border-white gap-3 transition-transform duration-300">


        <h2 class="item__name font-mono truncate font-bold text-2xl">{{ $item->item_name }}</h2>
        <p class="item__desc truncate font-mono"> {{ $item->item_description }} </p>
        <div class="item__price"><span>Price: </span><span class="text-red-600">{{ $item->item_price }}</span><span
                        class="text-green-600">$</span></div>
        <img src="{{ Str::startsWith($item->item_pic, 'http') ? $item->item_pic : Storage::url($item->item_pic) }}" alt="{{ $item->item_pic }}" class="item_image truncate">

        <div class="flex flex-row">
        <livewire:item-wire :item-id="$item->id" :key="$item->id" />
        </div>
        </div>
</a>