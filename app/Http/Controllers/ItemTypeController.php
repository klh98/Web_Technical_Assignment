<?php

namespace App\Http\Controllers;

use App\Models\ItemType;
use Illuminate\Http\Request;

class ItemTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $item_types = ItemType::all();
        return view('admin.item_type.index', compact('item_types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.item_type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $item_type = new ItemType();
        $item_type->name = $request->name;
        $item_type->description = $request->description;
        $item_type->save();

        return redirect('/item_type')->with('message', 'Item Type Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item_type = ItemType::findOrFail($id);
        return view('admin.item_type.edit', compact('item_type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item_type = ItemType::findOrFail($id);

        $item_type->name = $request->name;
        $item_type->description = $request->description;

        $item_type->update();

        return redirect('/item_type')->with('message', 'Item Type Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item_type = ItemType::find($id);
        $item_type->delete();

        return redirect()->back()->with('message', 'Item Type was deleted successfully');
    }
}
