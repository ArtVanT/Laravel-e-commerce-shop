<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Internet Shop</title>
</head>

<body>

@livewireScripts
    <div class="flex flex-col items-center mt-5">

        <div class="flex gap-6 mb-8">
            <div class="flex justify-center items-center bg-yellow-200 rounded-md border-none"><a
                    href="{{ route('login') }}"
                    class="inline-flex text-decoration-none font-bold font-mono text-red-500 text-xl px-2">login</a>
            </div>
            <div class="flex justify-center items-center bg-red-500 rounded-md "><a href="{{ route('register') }}"
                    class="inline-flex text-decoration-none font-bold font-mono text-yellow-200 text-xl px-2 border-none">Register</a>
            </div>
        </div>
        <main class="w-full flex flex-col gap-6">
            <h1 class="font-mono font-bold text-2xl">Main page</h1>
            <div x-data='slideshow' class="hero flex w-full">
                @verbatim
                    <button aria-label="back"
                        class="inline-flex  text-white bg-red-700 rounded-full p-5 items-center h-5 font-extrabold font-3xl"
                        x-on:click="prevBtn()">
                        < </button>
                @endverbatim
                        <div class="items__col  overflow-clip flex gap-x-3">

                            <div x-ref="itemsSell" class="flex w-6xl items-center gap-3">


                                {{-- alpine knowlege check --}}

                                @foreach($items as $item)

                                    <x-item-card :item="$item" />

                                @endforeach




                            </div>

                        </div>
                        @verbatim
                            <button aria-label="ahead"
                                class="inline-flex text-white bg-red-700 rounded-full p-5 items-center h-5 font-extrabold font-3xl"
                                x-on:click="nextBtn()">></button>
                        @endverbatim
            </div>
        </main>


    </div>
</body>

</html>