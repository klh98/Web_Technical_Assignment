<?php

namespace App\Http\Controllers;

use App\Models\ItemCondition;
use Illuminate\Http\Request;

class ItemConditionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $item_conditions = ItemCondition::all();
        return view('admin.item_condition.index', compact('item_conditions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.item_condition.create');
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

        $item_condition = new ItemCondition();
        $item_condition->name = $request->name;
        $item_condition->description = $request->description;
        $item_condition->save();

        return redirect('/item_condition')->with('message', 'Item Condition Added Successfully');
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
        $item_condition = ItemCondition::findOrFail($id);
        return view('admin.item_condition.edit', compact('item_condition'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item_condition = ItemCondition::findOrFail($id);

        $item_condition->name = $request->name;
        $item_condition->description = $request->description;

        $item_condition->update();

        return redirect('/item_condition')->with('message', 'Item Condition Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item_condition = ItemCondition::find($id);
        $item_condition->delete();

        return redirect()->back()->with('message', 'Item Condition was deleted successfully');
    }
}
