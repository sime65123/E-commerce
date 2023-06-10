@extends('layouts.app')

@section('title', 'My Order Details')

@section('content')
    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="p-3 shadow bg-white">
                        <h4 class="text-primary">
                            <i class="fa fa-shopping-cart text-dark"></i> My Order Details
                            <a href="{{ url('orders') }}" class="btn btn-danger btn-sm float-end">Back</a>
                        </h4>
                        <hr>

                        <div class="row">
                            <div class="col-md-6">
                                <h5>Order Details</h5>
                                <hr>
                                <h6>Order Id : <span class="fw-bold">{{ $order->id }}</span></h6>
                                <h6>Tracking Id/No : <span class="fw-bold">{{ $order->tracking_no }}</span></h6>
                                <h6>Order Created Date : <span class="fw-bold">{{ $order->created_at->format('d-m-Y h:i A') }}</span></h6>
                                <h6>Payment Mode : <span class="fw-bold">{{ $order->payment_mode }}</h6>
                                <h6 class="border p-2 text-success">
                                    Order Status Message : <span class="text-uppercase fw-bold">{{ $order->status_message }}</span>
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
                                    @foreach($order->orderItems as $key => $OrderItem)
                                        <tr>
                                            <td width="10%">{{ $OrderItem->id }}</td>
                                            <td with="10%">
                                                @if($OrderItem->product->productImages)
                                                    <img src="{{ asset($OrderItem->product->productImages[0]->image) }}"
                                                        style="width: 50px; height: 50px"
                                                        alt="{{ $OrderItem->product->name }}">
                                                @else
                                                    <img src="" style="width: 50px; height: 50px" alt="{{ $OrderItem->product->name }}">
                                                @endif
                                            </td>
                                            <td>
                                                {{ $OrderItem->product->name }}

                                                @if($OrderItem->productColor)
                                                    @if ($OrderItem->productColor->color)
                                                        <span>- Color : {{ $OrderItem->productColor->color->name }}</span>
                                                    @endif
                                                @endif
                                            </td>
                                            <td width="10%">{{ $OrderItem->price }} Fcfa</td>
                                            <td width="10%">{{ $OrderItem->quantity }}</td>
                                            <td width="10%" class="fw-bold">{{ $OrderItem->quantity * $OrderItem->price }} Fcfa</td>
                                            @php
                                                $totalPrice += $OrderItem->quantity * $OrderItem->price;
                                            @endphp
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="5" class="fw-bold">Total Amount : </td>
                                        <td colspan="1" class="fw-bold text-primary"><h5>{{ $totalPrice }} Fcfa </h5></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
