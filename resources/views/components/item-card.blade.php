<!-- The whole future lies in uncertainty: live immediately. - Seneca -->




<div
        class="item__single flex justify-center flex-col w-2xs bg-gray-100 rounded-lg p-5 h-full hover:scale-120 hover:border-4 hover:border-white align-center gap-3 transition-transform duration-300">



        <h2 class="item__name font-mono truncate font-bold text-2xl">{{ $item->item_name }}</h2>
        <p class="item__desc truncate font-mono"> {{ $item->item_description }} </p>
        <div class="item__price"><span>Price: </span><span class="text-red-600">{{ $item->item_price }}</span><span
                        class="text-green-600">$</span></div>
        <img src="{{ Storage::url($item->item_pic) }}" alt="{{ $item->item_pic }}" class="item_image truncate">

        <div class="flex gap-6">
                <div class="flex bg-red-500 rounded-md p-5"><a href="" class="text-white font-mono font-bold">find
                                more</a></div>
                <a href="" class="inline-flex w-1/4 bg-green-500 rounded-md p-5">
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
                </a>
        </div>
</div>