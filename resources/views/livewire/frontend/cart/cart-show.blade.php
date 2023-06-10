<div>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <h4><b>My Cart</b></h4>
            <hr>

            <div class="row">
                <div class="col-md-12">
                    <div class="shopping-cart">

                        <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Products</h4>
                                </div>
                                <div class="col-md-1">
                                    <h4>Price</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Quantity</h4>
                                </div>
                                <div class="col-md-1">
                                    <h4>Total</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Remove</h4>
                                </div>
                            </div>
                        </div>

                        @forelse($cart as $key => $cartItem)
                            @if ($cartItem->product)
                                <div class="cart-item">
                                    <div class="row">
                                        <div class="col-md-6 my-auto">
                                            <a href="{{ url('collections/'.$cartItem->product->category->slug.'/'.$cartItem->product->slug) }}">
                                                <label class="product-name">
                                                    @if($cartItem->product->productImages)
                                                        <img src="{{ $cartItem->product->productImages[0]->image }}"
                                                            style="width: 50px; height: 50px"
                                                            alt="{{ $cartItem->product->name }}">
                                                    @else
                                                        <img src="" style="width: 50px; height: 50px" alt="{{ $cartItem->product->name }}">
                                                    @endif

                                                    {{ $cartItem->product->name }}

                                                    @if($cartItem->productColor)
                                                        @if ($cartItem->productColor->color)
                                                            <span>- Color : {{ $cartItem->productColor->color->name }}</span>
                                                        @endif
                                                    @endif
                                                </label>
                                            </a>
                                        </div>
                                        <div class="col-md-1 my-auto">
                                            <label class="price">{{ $cartItem->product->selling_price }} Fcfa </label>
                                        </div>
                                        <div class="col-md-2 col-7 my-auto">
                                            <div class="quantity">
                                                <div class="input-group">
                                                    <button type="button" class="btn btn1" wire.loading.attr="disabled" wire:click="decrementQuantity({{ $cartItem->id }})"><i class="fa fa-minus"></i></button>
                                                    <input type="text" value="{{ $cartItem->quantity}}"  class="input-quantity" />
                                                    <button class="btn btn1" wire.loading.attr="disabled" wire:click="incrementQuantity({{ $cartItem->id }})"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1 my-auto">
                                            <label class="price">{{ $cartItem->product->selling_price *  $cartItem->quantity }} Fcfa </label>
                                            @php
                                                $totalPrice += $cartItem->product->selling_price *  $cartItem->quantity
                                            @endphp
                                        </div>
                                        <div class="col-md-2 col-5 my-auto">
                                            <div class="remove">
                                                <button type="button" wire.loading.attr="disabled" wire:click="removecartItem({{ $cartItem->id }})" class="btn btn-danger btn-sm">
                                                    <span wire:loading.remove wire:target="removecartItem({{ $cartItem->id }})">
                                                        <i class="fa fa-trash"></i> Remove
                                                    </span>
                                                    <span wire:loading wire:target="removecartItem({{ $cartItem->id }})">
                                                        <i class="fa fa-trash"></i> removing...
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @empty
                            <h4 class="alert alert-warning">No Cart Items Available</h4>
                        @endforelse

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8 my-md-auto mt-3">
                    <h3>
                        Get the Best Deals & Offers <a href="{{ url('/collections') }}">Shop Now</a>
                    </h3>
                </div>
                <div class="col-md-4 mt-3">
                    <div class="shadow-sm bg-white p-3">
                        <h4 class="text-uppercase"><b>Total :
                            <span class="float-end text-secondary">{{ $totalPrice }} Fcfa</span></b>
                        </h4>
                        <hr>
                        <a href="{{ url('/checkout') }}" class="btn btn-warning w-100">CheckOut</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
