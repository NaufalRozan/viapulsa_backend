<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    //show all item
    public function index()
    {
        $items = Item::all();

        return response()->json($items, 200);
    }

    //show single item
    public function show($id)
    {
        $item = Item::find($id);

        return response()->json($item, 200);
    }

    //create
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $item = new Item();
        $item->title = $request->title;
        $item->description = $request->description;

        $item->save();

        return response()->json(['message' => 'Item created successfully'], 201);
    }

    //update item
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $item = Item::find($id);
        $item->title = $request->title;
        $item->description = $request->description;

        $item->save();

        return response()->json(['message' => 'Item updated successfully'], 200);
    }

    //delete item
    public function destroy($id)
    {
        $item = Item::find($id);
        $item->delete();

        return response()->json(['message' => 'Item deleted successfully'], 200);
    }
}
