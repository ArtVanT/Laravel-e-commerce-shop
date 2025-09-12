<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $items = Item::latest()->get();

        return view('welcome', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        return view('create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

       $user = Auth::user();
        $validated = $request->validate([
            'item_name' => ['required', 'string', 'max:255'],
            'item_description' => ['required', 'string'],
            'item_num' => ['required', 'integer'],
            'item_price' => ['required', 'numeric'],
            'item_pic' => ['required', 'file', 'mimes:jpg,png,svg,webp,jpeg', 'max:2048']
        ]);

        $path = $request->file('item_pic')->store('items', 'public');

        $item = $user->items()->create([
            'item_name' => $validated['item_name'],
            'item_description' => $validated['item_description'],
            'item_num' => $validated['item_num'],
            'item_price' => $validated['item_price'],
            'item_pic' => $path
        ]);



        return redirect()->route('home')->with('item', $item);

    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
        return view('show', compact('item'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        

    }
}
