@extends('admin.master')

@section('content')

<div class="container-fluid mt-5">
    <h4 class="mt-5">Add Item</h4>
    <div class="row">
        <div class="col-md-6">
           <h5>Item Information</h5>
            <br>
           <form action="{{ url('admin/item') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="">Item Name</label>
            <input type="text" class="form-control" name="name">
            <br>
            <label for="">Select Category</label>
            <select name="category" id="" class="form-control">
                <option value="0">--- Select Category ---</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <br>
            <label for="">Price</label>
            <input type="text" class="form-control" name="price">
            <br>
            <label for="">Description</label>
            <input type="text" class="form-control" name="description">
            <br>
            <label for="">Select Item Condition</label>
            <select name="item_condition" id="" class="form-control">
                <option value="0">--- Select Item Condition ---</option>
                @foreach ($item_conditions as $item_condition)
                    <option value="{{ $item_condition->id }}">{{ $item_condition->name }}</option>
                @endforeach
            </select>
            <br>
            <label for="">Select Item Type</label>
            <select name="item_type" id="" class="form-control">
                <option value="0">--- Select Item Type ---</option>
                @foreach ($item_types as $item_type)
                    <option value="{{ $item_type->id }}">{{ $item_type->name }}</option>
                @endforeach
            </select>
            <br>
            <label for="">Status</label>
            <input type="checkbox" name="status"> Publish
            <br>
            <label for="">Photo</label>
            <input type="file" class="" name="image">
        </div>
        <div class="col-md-6">
          <h5>Owner Information</h5>
          <label for="">Owner Name</label>
            <input type="text" class="form-control" name="owner_name">
            <br>
            <label for="">Contact Number</label>
            <input type="text" class="form-control" name="owner_contact">
            <br>
            <label for="">Address</label>
            <textarea name="owner_address" class="form-control" id="" cols="30" rows="5"></textarea>
            <br>
            <label>Insert a Geo Location
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3819.3931421049683!2d96.14219017480588!3d16.806841619270596!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1eb179672b157%3A0xeb83fa5b4ac4e16f!2sTechnoland(Inya%20Branch)!5e0!3m2!1sen!2smm!4v1694663680288!5m2!1sen!2smm" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </label>
        </div>
    </div>
    <button class="btn btn-primary btn-sm">Save</button>
    </form>
</div>

@endsection

@section('script')
  <script>
      $('#geoloc').leafletLocationPicker();
  </script>
@endsection
