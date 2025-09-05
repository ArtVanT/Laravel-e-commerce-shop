<div>
    {{-- The whole world belongs to you. --}}
     <div class="flex flex-col gap-y-3 justify-center" x-data="{ open: false }">
        <input type="text" class="font-mono text-gray-800 font-xl" name="search" id="search" placeholder="Search users, and items" wire:model="search" wire:click="getUsersProperty">
        @if($search)
        @if($this->getUsersProperty()->isEmpty())
          <p>No users found for "{{ $search }}"</p>
          @else
                @foreach($this->getUsersProperty() as $user)
                    <p>{{ $user->name }}</p>
                @endforeach
        @endif
        @endif
        <h1 class="text-6xl font-mono font-extrabold">Admin Page</h1>
        <div class="flex flex-col">
            <h2 class="text-3xl font-mono font-bold">List of users</h2>
            <table class="text-lg font-mono px-5 w-2/3 border-collapse table-auto !important">
                <thead>
                    <tr class="border-2 border-gray-300">
                        <th class="text-left p-4 border-2 border-gray-300">Name</th>
                        <th class="text-left p-4 border-2 border-gray-300">Email</th>
                        <th class="text-left p-4 border-2 border-gray-300">creation data</th>
                        <th class="text-left p-4 border-2 border-gray-300">update data</th>
                        <th class="text-left p-4 border-2 border-gray-300">Role</th>
                        <th class="text-left p-4 border-2 border-gray-300">Action</th>
                    </tr>
                </thead>
            <tbody>
                @foreach($allUsers as $user)
                    @if($user->role !== 'admin')
                        
                            <tr>
                                <td class="border-2 border-gray-200 p-2" wire:key="{{ $user->name }}">{{ $user->name }}</td>
                                <td class="border-2 border-gray-200 p-2" wire:key="{{ $user->email }}">{{ $user->email }}</td>
                                <td class="border-2 border-gray-200 p-2" wire:key="{{ $user->created_at->format('M j, Y') }}">{{ $user->created_at->format('M j, Y') }}</td>
                                <td class="border-2 border-gray-200 p-2" wire:key="{{ $user->updated_at->format('M j, Y') }}">{{ $user->updated_at->format('M j, Y') }}</td>
                                <td class="border-2 border-gray-200 p-2" wire:key="{{ $user->role }}">{{ $user->role }}</td>
                                <td class="border-2 border-gray-200 p-2">
                                    <button class="bg-red-500 text-white px-3 py-1 rounded" wire:click="deleteUser({{ $user->id }})">Delete</button>
                            </tr>

                            
                    @endif
                @endforeach

                </tbody>

            </table>
            
           <form wire:submit.prevent="restoreUser">
    <input 
        type="text" 
        placeholder="Enter username to restore"
        class="font-mono text-gray-800 font-xl border-2 border-gray-200 mt-3 p-2"
        wire:model.defer="restoreUserName"
    >
    <button type="submit" class="ml-2 px-4 py-2 bg-green-600 text-white rounded">
        Restore
    </button>
</form>

            
        </div>
 
        <div class="flex flex-col mt-5">
            <div class="flex gap-x-3"><h2 class="text-3xl font-mono font-bold">List of Items</h2>
            <button @click="open = !open">
                <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" viewBox="0 0 24 24" fill="none">
<path d="M17.9188 8.17969H11.6888H6.07877C5.11877 8.17969 4.63877 9.33969 5.31877 10.0197L10.4988 15.1997C11.3288 16.0297 12.6788 16.0297 13.5088 15.1997L15.4788 13.2297L18.6888 10.0197C19.3588 9.33969 18.8788 8.17969 17.9188 8.17969Z" fill="#fff"/>
</svg>
            </button>
        </div>

            @foreach($allUsers as $user)
                <h3 class="font-mono text-2xl font-semobold">{{ $user->name }}</h3>
            <ul class="inline-flex flex-col gap-3 font-mono"  x-show="open">
                
                @foreach($user->items as $item)
                <table>
        <thead>
            <tr>
                <th class="border-2 p-2 border-gray-200 text-lg">Item</th>
                <th class="border-2 p-2 border-gray-200 text-md text-orange-600">Description</th>
                <th class="border-2 p-2 border-gray-200 text-md text-gray-300">Created At</th>
                <th class="border-2 p-2 border-gray-200 text-md text-gray-300">Updated At</th>
                <th class="border-2 p-2 border-gray-200 text-md">Price</th>
                <th class="border-2 p-2 border-gray-200 text-md">Quantity</th>
            </tr>
        </thead>
                <tbody>
                        <tr wire:key="{{ $item->id }}">
                        <td class="border-2 p-2 border-gray-200 text-lg">{{ $item->item_name }}</td>
                        <td class="border-2 p-2 border-gray-200 text-md text-orange-600">{{ $item->item_description }}</td>
                        <td class="border-2 p-2 border-gray-200 text-md text-gray-300">{{ $item->created_at }}</td>
                        <td class="border-2 p-2 border-gray-200 text-md text-gray-300">{{ $item->updated_at }}</td>
                        <td class="border-2 p-2 border-gray-200 text-md">{{ $item->item_price }}</td>
                        <td class="border-2 p-2 border-gray-200 text-md">{{ $item->item_num }}</td>
                          </tr>
                          </tbody>
                          </table>
                @endforeach
               
               </ul>
            @endforeach
        </div>

    </div>

</div>
