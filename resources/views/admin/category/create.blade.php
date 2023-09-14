@extends('admin.master')

@section('content')

    <div class="container-fluid mt-5 card p-5">
        <h4>Add Categories</h4>
        <div class="row mt-3">
            <div class="col-md-6">
                <form action="{{ url('admin/category/') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="">Category Name</label>
                    <input type="text" name="name" class="form-control">
                    <br>
                    <label for="">Photo</label>
                    <input type="file" name="image">
                    <br><br>
                    <label for="">Status</label>
                    <input type="checkbox" name="status">
                    <br>
                    <button class="btn btn-primary btn-sm">Save</button>
                    </form>
            </div>
            <div class="col-md-6"></div>
        </div>
    </div>

@endsection
