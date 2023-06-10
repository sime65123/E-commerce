@extends('layouts.admin')

@section('title', 'My Order Details')

@section('content')
<div class="row">
    <div class="col-md-12">

        @if(session('message'))
            <div class="alert alert-success mb-3">{{ session('message') }}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3> My Order Detail</h3>
            </div>
            <div class="card-body">
                <div class="p-3 shadow bg-white">
                    <h4 class="text-primary">
                        <i class="fa fa-shopping-cart text-dark"></i> My Order Details
                        <a href="{{ url('admin/orders') }}" class="btn btn-danger btn-sm float-end">Back</a>
                        <a href="{{ url('admin/invoice/'.$order->id.'/generate') }}" class="btn btn-primary btn-sm mx-2 float-end">
                            Download Invoice
                        </a>
                        <a href="{{ url('admin/invoice/'.$order->id) }}" target="_blank" class="btn btn-warning btn-sm float-end">
                            View Invoice
                        </a>
                        <a href="{{ url('admin/invoice/'.$order->id.'/mail') }}" class="btn btn-info btn-sm mx-2 float-end">
                            Send Invoice Via Mail
                        </a>
                    </h4>
                    <hr>

                    <div class="row">
                        <div class="col-md-6">
                            <h5>Order Details</h5>
                            <hr>
                            <h6>Order Id : <span class="fw-bold">{{ $order->id }}</span></h6>
                            <h6>Tracking Id/No : <span class="fw-bold">{{ $order->tracking_no }}</span></h6>
                            <h6>Order Created Date : <span class="fw-bold">{{ $order->created_at->format('d-m-Y h:i A')
                                    }}</span></h6>
                            <h6>Payment Mode : <span class="fw-bold">{{ $order->payment_mode }}</h6>
                            <h6 class="border p-2 text-success">
                                Order Status Message : <span class="text-uppercase fw-bold">{{ $order->status_message
                                    }}</span>
                            </h6>
                        </div>
                        <div class="col-md-6">
                            <h5>User Details</h5>
                            <hr>
                            <h6>Full Name : <span class="fw-bold">{{ $order->fullname }}</span></h6>
                            <h6>Email Id : <span class="fw-bold">{{ $order->email }}</span></h6>
                            <h6>Phone : <span class="fw-bold">{{ $order->phone }}</span></h6>
                            <h6>Address : <span class="fw-bold">{{ $order->address }}</span></h6>
                            <h6>Pin code : <span class="fw-bold">{{ $order->pincode }}</span></h6>
                        </div>
                    </div>

                    <br>
                    <h5>Order Items</h5>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <th>Item ID</th>
                                <th>Image </th>
                                <th>Product</th>
                                <th>Price </th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </thead>
                            <tbody>
                                @php
                                $totalPrice = 0;
                                @endphp
                                @foreach($order->orderItems as $OrderItem)
                                <tr>
                                    <td width="10%">{{ $OrderItem->id }}</td>
                                    <td with="10%">
                                        @if(isset($OrderItem->product->productImages))
                                        <img src="{{ asset($OrderItem->product->productImages[0]->image) }}"
                                            style="width: 50px; height: 50px" alt="{{ $OrderItem->product->name }}">
                                        @else
                                            @if(isset($OrderItem->product->name))
                                                <img src="" style="width: 50px; height: 50px"
                                                alt="{{ $OrderItem->product->name }}">
                                            @else
                                                <img src="" style="width: 50px; height: 50px"
                                                alt="Not have Name">
                                            @endif
                                        @endif
                                    </td>
                                    <td>
                                       @if(isset($OrderItem->product->name))
                                            {{ $OrderItem->product->name }}
                                       @else
                                            {{ 'Not have Name' }}
                                       @endif

                                        @if($OrderItem->productColor)
                                            @if ($OrderItem->productColor->color)
                                                <span>- Color : {{ $OrderItem->productColor->color->name }}</span>
                                            @endif
                                        @endif
                                    </td>
                                    <td width="10%">{{ $OrderItem->price }} Fcfa</td>
                                    <td width="10%">{{ $OrderItem->quantity }}</td>
                                    <td width="10%" class="fw-bold">{{ $OrderItem->quantity * $OrderItem->price }} Fcfa
                                    </td>
                                    @php
                                    $totalPrice += $OrderItem->quantity * $OrderItem->price;
                                    @endphp
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="5" class="fw-bold">Total Amount : </td>
                                    <td colspan="1" class="fw-bold text-primary">
                                        {{ $totalPrice }} Fcfa
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

        <div class="card border mt-3">
            <div class="card-body">
                <h4>Order Process (Order Status Updates)</h4>
                <hr>

                <div class="row">
                    <div class="col-md-5">
                        <form action="{{ url('admin/orders/'.$order->id) }}" method="POST">
                            @csrf
                            @method('put')

                            <label for="">Update Your Order Status</label>
                            <div class="input-group">
                                <select name="order_status" id="order_status" class="form-select">
                                    <option value="">--Select All Status--</option>
                                    <option value="In Progress" {{ Request::get('status') == 'In Progress' ? 'selected':''}}> In Progress</option>
                                    <option value="COMPLETED" {{ Request::get('status') == 'COMPLETED' ? 'selected':''}}> COMPLETED</option>
                                    <option value="PENDING" {{ Request::get('status') == 'PENDING' ? 'selected':''}}> PENDING</option>
                                    <option value="CANCELLED" {{ Request::get('status') == 'CANCELLED' ? 'selected':''}}> CANCELLED</option>
                                    <option value="out-for-delivery" {{ Request::get('status') == 'out-for-delivery' ? 'selected':''}}> Out For Delivery</option>
                                </select>
                                <button type="submit" class="btn btn-primary text-white">Update</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-7">
                        <br>
                        <h4 class="mt-3">Current Order Status : <span class="text-uppercase text-success fw-bold">{{ $order->status_message }}</span></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
