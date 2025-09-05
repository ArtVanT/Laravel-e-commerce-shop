<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Internet Shop</title>
    <title>Create item</title>
</head>

<body class="bg-blue-900">
    <main class="flex gap-5 flex-col justify-center items-center pt-5">
        <h1 class="text-2xl text-mono font-bold text-cyan-500">Add a file to your item-list</h1>

        <form action="{{ route('items.store') }}" method="post"
            class="flex flex-col gap-5 p-5 justify-center items-start bg-gray-300 w-xs rounded-xl"
            enctype="multipart/form-data">

            @csrf

            <label for="item_name">Item name</label>
            <input type="text" name="item_name" id="" placeholder="enter your item's name">

            <label for="item_desc">enter your description here</label>
            <textarea name="item_description" class="h-48 w-72" placeholder="your description"></textarea>

            <label for="item_num">remains of item</label>
            <input type="number" name="item_num" id="" placeholder="enter your item's number">

            <label for="item_price">the price of item</label>
            <input type="number" name="item_price" id="" placeholder="enter your item's price">

            <label for="item_pic">the picture of item</label>
            <input type="file" name="item_pic" id="" accept="image/*" class=" text-sm max-w-1/3" required>
            <button type="submit"
                class="font-mono font-bold text-lg px-5 py-0.5 text-accent-foreground rounded-lg bg-red-700">Add
                Item</button>
        </form>

    </main>
</body>

</html>