<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use App\Models\ItemType;
use Illuminate\Http\Request;
use App\Models\ItemCondition;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{

    public function index()
    {
        $items = Item::orderBy('id', 'desc')->get();

        return view('admin.item.index', compact('items'));
    }

    public function create()
    {
        $categories = Category::all();
        $item_conditions = ItemCondition::all();
        $item_types = ItemType::all();
        return view('admin.item.create', compact(['categories', 'item_conditions', 'item_types']) );
    }

    public function store(Request $request)
    {
        if($request->hasFile('image'))
        {
            $img_file= $request->file('image');
            $img_file_name= uniqid().'-'.time().'.'.$img_file->getClientOriginalExtension();
            Storage::disk('public')->put('img/' .$img_file_name, file_get_contents($img_file));
        }

        $item = new Item();
        $item->name= $request->name;
        $item->category_id= $request->category;
        $item->description= $request->description;
        $item->price= $request->price;
        $item->status= $request->status == TRUE ? '1' : '0';
        $item->owner_name= $request->owner_name;
        $item->owner_contact= $request->owner_contact;
        $item->owner_address= $request->owner_address;
        $item->item_condition= $request->item_condition;
        $item->item_type= $request->item_type;
        $item->photo= $img_file_name;

        $item->save();

        return redirect('/admin/item')->with('message', 'Item Added Successfully');
    }

    public function edit($id)
    {
        $item = Item::findOrFail($id);
        $categories = Category::all();
        $item_conditions = ItemCondition::all();
        $item_types = ItemType::all();
        return view('admin.item.edit', compact([ 'item', 'categories', 'item_conditions', 'item_types']));
    }

    public function update(Request $request, string $id)
    {
        $item = Item::findOrFail($id);

        //get old photo
        $img_file_name = $item->photo;

        //check if new photo insert or not
        if($request->hasFile('image'))
        {
            Storage::disk('public')->delete('img/' . $item->photo); //Delete Old photo

            //Insert new photo
            $img_file= $request->file('image');
            $img_file_name= uniqid().'-'.time().'.'.$img_file->getClientOriginalExtension();
            Storage::disk('public')->put('img/' .$img_file_name, file_get_contents($img_file));
        }

       $item->name= $request->name;
       $item->category_id= $request->category;
       $item->description= $request->description;
       $item->status= $request->status == TRUE ? '1' : '0' ;
       $item->price= $request->price;
       $item->item_condition= $request->item_condition;
       $item->item_type= $request->item_type;
       $item->owner_name= $request->owner_name;
       $item->owner_contact= $request->owner_contact;
       $item->owner_address= $request->owner_address;
       $item->photo= $img_file_name;

       $item->update();

       return redirect('/admin/item')->with('message', 'Item Updated Successfully');

    }

    public function destroy($id)
    {
        $item = Item::find($id);
        $item->delete();

        return redirect()->back()->with('message', 'Item was deleted successfully');
    }

}
