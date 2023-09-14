@extends('admin.master')

@section('content')

    <div class="container-fluid mt-5 card">

        <div class="row mt-3">
            <div class="col-md-6 p-3">
                <h4>Create Item Condition</h4>
                <form action="{{ url('/item_condition') }}" method="POST">
                    @csrf
                    <label for="">Condition Name</label>
                    <input type="text" name="name" class="form-control">
                    <br>
                    <label for="">Description</label>
                    <textarea name="description" class="form-control" id="" cols="30" rows="5"></textarea>
                    <br>
                    <button class="btn btn-primary btn-sm">Save</button>
                    </form>
            </div>
            <div class="col-md-6"></div>
        </div>
    </div>

@endsection
