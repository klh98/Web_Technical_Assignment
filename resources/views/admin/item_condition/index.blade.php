@extends('admin.master')

@section('content')

    <div class="mb-5">
        <h4 class="mt-5">Item Condition</h4>
        <a href="{{ url('/item_condition/create') }}" class="btn btn-primary btn-sm" style="float: right;">Add New</a>
    </div>

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
                <th>Item Condition</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($item_conditions as $item)
                <tr>
                    <td class="d-flex">
                        <a href="{{ url('item_condition/' . $item->id . '/edit', ) }}" class="btn btn-success mr-2">Edit</a>
                        <a href="{{ url('delete_item_condition', $item->id) }}" onclick="return confirm('Are you sure to delete this?')"
                            class="btn btn-danger">Delete</a>
                    </td>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
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
