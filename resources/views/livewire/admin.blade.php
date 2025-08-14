<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Admin</title>
</head>

<body>
    <div class="flex flex-col gap-y-3">
        <h1 class="text-6xl font-mono font-extrabold">Admin Page</h1>
        <div class="flex flex-col">
            <h2 class="text-3xl font-mono font-bold">List of users</h2>
            <ul class="flex flex-col gap-x-3">
                @foreach($users as $user)
                    @if($user->role !== 'admin')
                        <li class="text-lg font-mono">
                            <span>{{ $user->name }}</span>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>

        <div class="flex flex-col">
            <h2 class="text-3xl font-mono font-bold">List of Items</h2>

            @foreach($users as $user)
                <h3 class="font-mono text-2xl font-semobold">{{ $user->name }}</h3>
                @foreach($user->items as $item)
                    <ul class="inline-flex gap-3">
                        <li class="text-lg font-mono">
                            <span>{{ $item->item_name }}</span>
                        </li>
                @endforeach
                </ul>
            @endforeach
        </div>

    </div>
</body>

</html>