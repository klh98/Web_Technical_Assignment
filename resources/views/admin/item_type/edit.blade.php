@extends('admin.master')

@section('content')

<div class="container-fluid mt-5 card">
    <div class="row">
        <div class="col-md-6 p-5">
            <h4 class="mb-4">Update Item Type Form</h4>
            <form action="{{ url('item_type', $item_type->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    <div>
                        <label for="">Item Type Name</label>
                        <input type="text" name="name" class="form-control mb-3" value="{{ $item_type->name }}">
                    </div>

                    <div>
                        <label for="">Description</label>
                        <textarea name="description" class="form-control" id="" cols="30" rows="10">
                            {{ $item_type->description }}
                        </textarea>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Update</button>
                </form>
        </div>
        <div class="col-md-6"></div>
    </div>

</div>

@endsection
