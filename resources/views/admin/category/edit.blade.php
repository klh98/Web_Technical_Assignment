@extends('admin.master')

@section('content')

<div class="container-fluid mt-5 card">
    <div class="row">
        <div class="col-md-6 p-5">
            <h4 class="mb-4">Update Category Form</h4>
            <form action="{{ url('admin/update_category', $category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- @method('PUT') --}}
                    <div>
                        <label for="">Category Name</label>
                        <input type="text" name="name" class="form-control mb-3" value="{{ $category->name }}">
                    </div>

                    <div>
                        <label for="">Status</label>
                        <input type="checkbox" name="status" class="mb-3" {{ $category->status == '1' ? 'checked' : ''}}>
                    </div>

                    <div class="preview_img">
                        @if($category->image)
                            <img src="{{ $category->img_path() }}" width="100px" height="100px" alt="category" class="mb-3">
                        @endif
                    </div>

                    <div class="mt-3">
                        <label for="">New Image</label>
                        <input type="file" name="image">
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Update</button>
                </form>
        </div>
        <div class="col-md-6"></div>
    </div>

</div>

@endsection
