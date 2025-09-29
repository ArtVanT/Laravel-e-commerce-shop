<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ $item->item_name }}</title>
</head>
<body class="font-mono text-slate-500 flex flex-col items-center justify-center gap-4">
    <h1 class="text-3xl font-bold text-center text-slate-900">{{ $item->item_name }}</h1>
    <div class="flex flex-col gap-4 items-start justify-center">
    <p class="text-left">{{ $item->item_description }}</p>
    <p class="text-left">Price: ${{ $item->item_price }}</p>
    <p class="text-left">Quantity: {{ $item->item_num }}</p>
    </div>
    <img src="{{ asset('storage/' . $item->item_pic) }}" alt="{{ $item->item_name }}">
   
        <livewire:item-wire :item="$item"  class="mt-4 "/>
   
</body>
</html>