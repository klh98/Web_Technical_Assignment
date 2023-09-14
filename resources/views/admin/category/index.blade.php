@extends('admin.master')

@section('content')

    <h4 class="mt-5">Category</h4>

    <a href="{{ url('/admin/category/create') }}" class="btn btn-primary btn-sm mb-4" style="float: right;">Add New</a>


    @if(Session::has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session::get('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <table class="table table-hover mt-5" id="category">

        <thead>
            <tr>
                <th>Action</th>
                <th>No</th>
                <th>Category</th>
                <th>Publish</th>
            </tr>
        </thead>

        <tbody>
            @php
                $i= 1;
            @endphp
            @foreach ($categories as $category)
                <tr>
                    <td class="d-flex">
                        <a href="{{ url('admin/category/' . $category->id . '/edit', ) }}" class="btn btn-success mr-2">Edit</a>
                        <a href="{{ url('admin/delete_category', $category->id) }}" onclick="return confirm('Are you sure to delete this?')"
                            class="btn btn-danger">Delete</a>
                    </td>
                    <td> {{ $i++ }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->status }}</td>
                </tr>
            @endforeach
        </tbody>

    </table>

@endsection

@section('script')
<script>
    let table = new DataTable('#category');
</script>
@endsection
