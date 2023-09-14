@extends('admin.master')

@section('content')


    <h4 class="mt-5">Items</h4>
    {{-- <div class="mb-4" style="float: right; background-color: royalblue; padding: 10px; border-radius: 50%;">
        <p class="text-white">{{ auth()->user()->name }}</p>
    </div> --}}

    <a href="{{ url('/admin/item/create') }}" class="btn btn-primary btn-sm mb-4" style="float: right;">Add New</a>


    @if(Session::has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session::get('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <table class="table table-hover mt-5" id="item">

        <thead>
            <tr>
                <th>Action</th>
                <th>No</th>
                <th>Item</th>
                <th>Category</th>
                <th>Description</th>
                <th>Price</th>
                <th>Owner</th>
                <th>Publish</th>
            </tr>
        </thead>

        <tbody>
            @php
                $i= 1;
            @endphp
            {{-- {{ dd($items) }} --}}
            @foreach ($items as $item)
                <tr>
                    <td class="d-flex">
                        <a href="{{ url('admin/item/' . $item->id . '/edit', ) }}" class="btn btn-success mr-2">Edit</a>
                        <a href="{{ url('admin/delete_item', $item->id) }}" onclick="return confirm('Are you sure to delete this?')"
                            class="btn btn-danger">Delete</a>
                    </td>
                    <td> {{ $i++ }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->category->name ?? 'None'}}</td>
                    <td>{{ $item->description }}</td>
                    <td> $ {{ $item->price }}</td>
                    <td>{{ $item->owner_name }}</td>
                    <td><input type="checkbox" data-toggle="toggle" data-size="sm" {{ $item->status == 1 ? 'checked' : ''}}></td>
                </tr>
            @endforeach
        </tbody>

    </table>

@endsection

@section('script')
<script>
    let table = new DataTable('#item');
</script>
@endsection
