@extends('layouts.admin')

@section('title', 'My Orders')

@section('content')
<div class="row">
    <div class="col-md-12">
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3> My Orders</h3>
            </div>
            <div class="card-body">

                <form action="" method="GET">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="date">Filter By Date</label>
                            <input type="date" name="date" value="{{ Request::get('date') ?? date('Y-m-d') }}" class="form-control">
                        </div>
                        <div class="col-md-3 my-1">
                            <label for="status">Filter By Status</label>
                            <select name="status" id="status" class="form-select">
                                <option value="">--Select All Status--</option>
                                <option value="In Progress" {{ Request::get('status') == 'In Progress' ? 'selected':''}}> In Progress</option>
                                <option value="COMPLETED" {{ Request::get('status') == 'COMPLETED' ? 'selected':''}}> COMPLETED</option>
                                <option value="PENDING" {{ Request::get('status') == 'PENDING' ? 'selected':''}}> PENDING</option>
                                <option value="CANCELLED" {{ Request::get('status') == 'CANCELLED' ? 'selected':''}}> CANCELLED</option>
                                <option value="out-for-delivery" {{ Request::get('status') == 'out-for-delivery' ? 'selected':''}}> Out For Delivery</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <br>
                            <button type="submit" class="btn btn-primary mx-1">Filter</button>
                            <button type="submit" class="btn btn-success" name="view_all">View All Orders</button>
                        </div>
                    </div>
                </form>
                <hr>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>Order ID</th>
                            <th>Tracking No</th>
                            <th>Username</th>
                            <th>payment Mode</th>
                            <th>Ordered Date</th>
                            <th>Status Message</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @forelse($orders as $key => $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->tracking_no }}</td>
                                    <td>{{ $item->fullname }}</td>
                                    <td>{{ $item->payment_mode }}</td>
                                    <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                    <td>{{ $item->status_message }}</td>
                                    <td>
                                        <a href="{{ url('admin/orders/'.$item->id) }}" class="btn btn-outline-primary btn-sm">View</a>
                                        <a href="{{ url('admin/orders/'.$item->id.'/delete') }}" class="btn btn-outline-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">No orders Available</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="py-2">
                        {{ $orders->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
