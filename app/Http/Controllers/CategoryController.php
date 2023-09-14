<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('admin.category.index', compact('categories'));
    }


    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        if($request->hasFile('image'))
        {
            $img_file= $request->file('image');
            $img_file_name= uniqid().'-'.time().'.'.$img_file->getClientOriginalExtension();
            Storage::disk('public')->put('img/' .$img_file_name, file_get_contents($img_file));
        }

        $category = new Category();
        $category->name = $request->name;
        $category->status = $request->status == TRUE ? '1' : '0';
        $category->image= $img_file_name;
        $category->save();

        return redirect('/admin/category')->with('message', 'Category Added Successfully');

    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

         //get old photo
         $img_file_name = $category->image;

         //check if new photo insert or not
         if($request->hasFile('image'))
         {
             Storage::disk('public')->delete('img/' . $category->image); //Delete Old photo

             //Insert new photo
             $img_file= $request->file('image');
             $img_file_name= uniqid().'-'.time().'.'.$img_file->getClientOriginalExtension();
             Storage::disk('public')->put('img/' .$img_file_name, file_get_contents($img_file));
         }

        $category->name = $request->name;
        $category->status = $request->status == TRUE ? '1' : '0';

        $category->update();

        return redirect('/admin/category')->with('message', 'Category Updated Successfully');
    }

    public function destroy($id)
    {
        $product = Category::find($id);
        $product->delete();

        return redirect()->back()->with('message', 'Category was deleted successfully');
    }



}
