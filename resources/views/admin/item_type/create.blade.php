@extends('admin.master')

@section('content')

    <div class="container-fluid mt-5">
        <h4>Create Item Type</h4>
        <div class="row mt-3">
            <div class="col-md-6">
                <form action="{{ url('/item_type') }}" method="POST">
                    @csrf
                    <label for="">Item Type Name</label>
                    <input type="text" name="name" class="form-control">
                    <br>
                    <label for="">Description</label>
                    <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>
                    <br>
                    <button class="btn btn-primary btn-sm">Save</button>
                    </form>
            </div>
            <div class="col-md-6"></div>
        </div>
    </div>

@endsection
