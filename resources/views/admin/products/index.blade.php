@extends('layouts\admin')

@section('content')

<div class="container-scroller">
    <div class="row">
        <div class="col-md-12">

            @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>All products
                        <a href="{{ url('admin/products/create') }}" class="btn btn-primary btn-sm float-end">Add
                            Product</a>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($products as $product)
                                <tr>
                                    <td class="py-1">
                                        {{ $product->id }}
                                    </td>
                                    <td>
                                       @if ($product->category)
                                          {{ $product->category->name }}
                                       @else
                                           No Category
                                       @endif
                                    </td>
                                    <td>
                                        {{ $product->name }}
                                    </td>
                                    <td>
                                        {{ $product->selling_price }}
                                    </td>
                                    <td>
                                        {{ $product->quantity }}
                                    </td>
                                    <td>
                                        {{ $product->status =='1' ? 'Hidden':'Visible' }}
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/products/'.$product->id.'/edit') }}"
                                            class="btn btn-outline-success mx-1">Edit</a>
                                        <!-- Button trigger modal -->
                                        <a href="{{ url('admin/products/'.$product->id.'/delete') }}" onclick="return confirm('Are you sure, you want to delete this data?')" class="btn btn-outline-danger my-1">Delete</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8">No Products Available</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="py-2">
                        {{ $products->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

