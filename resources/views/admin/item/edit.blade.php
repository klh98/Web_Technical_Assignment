@extends('admin.master')

@section('content')

<div class="container-fluid mt-5">
    <h4 class="mt-5">Add Item</h4>
    <div class="row">
        <div class="col-md-6">
           <h5>Item Information</h5>
            <br>
           <form action="{{ url('admin/item_update', $item->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="">Item Name</label>
            <input type="text" class="form-control" name="name" value="{{ $item->name }}">
            <br>
            <label for="">Select Category</label>
            <select name="category" id="" class="form-control">
                <option value="0">--- Select Category ---</option>
                @foreach ($categories  as $category)
                    <option value="{{ $category->id }}" @if ($item->category_id == $category->id)
                        selected
                    @endif>{{ $category->name }}</option>
                @endforeach
            </select>
            <br>
            <label for="">Price</label>
            <input type="text" class="form-control" name="price" value="{{ $item->price }}">
            <br>
            <label for="">Description</label>
            <input type="text" class="form-control" name="description" value="{{ $item->description }}">
            <br>
            <label for="">Select Item Condition</label>
            <select name="item_condition" id="" class="form-control">
                <option value="0">--- Select Item Condition ---</option>
                @foreach ($item_conditions  as $item_condition)
                    <option value="{{ $item_condition->id }}" @if ($item->item_condition == $item_condition->id)
                        selected
                    @endif>{{ $item_condition->name }}</option>
                @endforeach
            </select>
            <br>
            <label for="">Select Item Type</label>
            <select name="item_type" id="" class="form-control">
                <option value="0">--- Select Item Type ---</option>
                @foreach ($item_types  as $item_type)
                    <option value="{{ $item_type->id }}" @if ($item->item_type == $item_type->id)
                        selected
                    @endif>{{ $item_type->name }}</option>
                @endforeach
            </select>
            <br>
            <label for="">Status</label>
            <input type="checkbox" name="status" {{ $item->status == '1' ? 'checked' : '' }}> Publish
            <br>
            <div class="preview_img">
                @if($category->image)
                    <img src="{{ $category->img_path() }}" width="100px" height="100px" alt="category" class="mb-3">
                @endif
            </div>
            <br>
            <label for="">Photo</label>
            <input type="file" class="" name="image">
        </div>
        <div class="col-md-6">
          <h5>Owner Information</h5>
          <label for="">Owner Name</label>
            <input type="text" class="form-control" name="owner_name" value="{{ $item->owner_name }}">
            <br>
            <label for="">Contact Number</label>
            <input type="text" class="form-control" name="owner_contact" value="{{ $item->owner_contact }}">
            <br>
            <label for="">Address</label>
            <textarea name="owner_address" class="form-control" id="" cols="30" rows="5">
                {{ $item->owner_address }}
            </textarea>
            <br>
        </div>
    </div>
    <button class="btn btn-primary btn-sm">Save</button>
    </form>
</div>

@endsection
