<div class="flex gap-2 relative h-fit w-fit" x-data="{ 
open: false,
toggleBtn: function() { this.open = !this.open; }
}">
        <div class="flex gap-x-3">
                <button class=" flex bg-red-500 !h-14 rounded-md p-5 text-white font-mono font-bold">Buy</button>
                <button @click="toggleBtn" class="inline-flex !h-14 w-18 bg-green-500 rounded-md p-5">
                        <span class='text-white inline-flex font-mono font-bold'><svg width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-cart">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                        <path d="M17 19m-2 0a2 2 0_1 0 4 0a2 2 0_1 0 -4 0" />
                                        <path d="M17 17h-11v-14h-2" />
                                        <path d="M6 5l14 1l-1 7h-13" />
                                </svg></span>
                </button>
                </div>
                <div x-show="open"
                        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-90"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-90"
        class="z-100 -translate-y-34 translate-x-42 absolute top-0 left-0 w-full h-full"
                >
                <livewire:basket :item-id="$item->id" :item-price="$item->item_price" />
                        </div>
        
      
        </div>
