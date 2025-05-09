<div>
    <div class="py-3 py-md-5">
        <div class="container">
            {{-- @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif --}}
            <div class="row">
                <div class="col-md-5 mt-3">
                    <div class="bg-white border" wire:ignore>
                        @if ($product->productImages)
                        {{-- <img src="{{ asset($product->productImages[0]->image) }}" class="w-100" alt="Img"> --}}
                        <div class="exzoom" id="exzoom">
                            <font></font>

                            <div class="exzoom_img_box">
                                <font></font>
                                <ul class='exzoom_img_ul'>
                                    <font></font>
                                    @foreach ($product->productImages as $itemImg)
                                    <li><img src="{{ asset($itemImg->image) }}" /></li>
                                    <font></font>
                                    @endforeach
                                </ul>
                                <font></font>
                            </div>
                            <font></font>

                            <div class="exzoom_nav"></div>
                            <font></font>
                            <p class="exzoom_btn">
                                <font></font>
                                <a href="javascript:void(0);" class="exzoom_prev_btn">
                                    < </a>
                                        <font></font>
                                        <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
                                        <font></font>
                            </p>
                            <font></font>
                        </div>
                        <font></font>
                        @else
                        <h5>No Image Added</h5>
                        @endif
                    </div>
                </div>
                <div class="col-md-7 mt-3">
                    <div class="product-view">
                        <h4 class="product-name">
                            {{ $product->name }}
                        </h4>
                        <hr>
                        <p class="product-path">
                            Home / {{ $product->category->name }} / {{ $product->name }}
                        </p>
                        <p class="product-path fw-bold alert alert-warning">
                           Brand : <span class="text-success">{{ $product->brand }}</span>
                        </p>
                        <div>
                            <span class="selling-price">{{ $product->selling_price }} Fcfa</span>
                            <span class="original-price">{{ $product->original_price }} Fcfa</span>
                        </div>
                        <div>
                            @if ($product->productColors->count() > 0)
                            @if($product->productColors)
                            @foreach($product->productColors as $key => $colorItem)
                            {{-- <inputtype="radio"name="colorSelection"value="$colorItem->id }}"> {{
                                $colorItem->color->name }} --}}
                                <label class="colorSelectionLabel"
                                    style="background-color: {{ $colorItem->color->code }}"
                                    wire:click="colorSelected({{ $colorItem->id }})">
                                    {{ $colorItem->color->name }}
                                </label>
                                @endforeach
                                @endif

                                <div>
                                    @if ($this->productColorSelectedQuantity == 'outOfStock')
                                    <label class="btn-sm py-1 mt-2 text-white bg-danger">Out of Stock</label>
                                    @elseif($this->productColorSelectedQuantity > 0)
                                    <label class="btn-sm py-1 mt-2 text-white bg-success">In Stock</label>
                                    @endif
                                </div>

                                @else
                                @if($product->quantity)
                                <label class="btn-sm py-1 mt-2 text-white bg-success">In Stock</label>
                                @else
                                <label class="btn-sm py-1 mt-2 text-white bg-danger">Out of Stock</label>
                                @endif

                                @endif
                        </div>
                        <div class="mt-2">
                            <div class="input-group">
                                <span class="btn btn1" wire:click="decrementQuantity"><i class="fa fa-minus"></i></span>
                                <input type="text" wire:model="quantityCount" value="{{ $this->quantityCount }}"
                                    readonly class="input-quantity" />
                                <span class="btn btn1" wire:click="incrementQuantity"><i class="fa fa-plus"></i></span>
                            </div>
                        </div>
                        <div class="mt-2">

                            <button type="button" wire:click="addToCart({{ $product->id }})" class="btn btn1">
                                <i class="fa fa-shopping-cart"></i> Add To Cart
                            </button>

                            <button type="button" wire:click="addToWishlist({{ $product->id }})" class="btn btn1">
                                <span wire:loading.remove wire:target="addToWishlist">
                                    <i class="fa fa-heart"></i> Add To Wishlist
                                </span>
                                <span wire:loading wire:target="addToWishlist">Adding...</span>
                            </button>
                        </div>
                        <div class="mt-3">
                            <h5 class="mb-0">Small Description</h5>
                            <p>
                                {!! $product->small_description !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h2 class="fw-bold">Description</h2>
                        </div>
                        <div class="card-body">
                            <p>
                                {!! $product->description !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <h3>
                        Related
                        @if ($category)
                            {{ $category->name }}
                        @endif
                        Products
                    </h3>
                    <div class="underline"></div>
                </div>

                <div class="col-md-12">
                    @if($category)
                        <div class="owl-carousel owl-theme four-carousel">
                            @foreach($category->relatedProducts as $key => $relatedproduct)
                                <div class="item mb-3">
                                    <div class="product-card">
                                        <div class="product-card-img">
                                            @if($relatedproduct->productImages->count() > 0)
                                            <a href="{{ url('/collections/'.$relatedproduct->category->slug.'/'.$relatedproduct->slug) }}">
                                                <img src="{{ asset($relatedproduct->productImages[0]->image) }}" alt="{{ $relatedproduct->name }}">
                                            </a>
                                            @endif
                                        </div>
                                        <div class="product-card-body">
                                            <p class="product-brand">{{ $relatedproduct->brand }}</p>
                                            <h5 class="product-name">
                                                <a href="{{ url('/collections/'.$relatedproduct->category->slug.'/'.$relatedproduct->slug) }}">
                                                    {{ $relatedproduct->name }}
                                                </a>
                                            </h5>
                                            <div>
                                                <span class="selling-price">{{ $relatedproduct->selling_price.'Fcfa' }}</span>
                                                <span class="original-price">{{ $relatedproduct->original_price.'Fcfa' }} </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="p-2">
                            <h5>No Related Products Available</h5>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>


    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <h3>
                        Related
                        @if ($product)
                            {{ $product->brand }}
                        @endif
                        Products
                    </h3>
                    <div class="underline"></div>
                </div>
                <div class="col-md-12">
                    @if($category)
                        <div class="owl-carousel owl-theme four-carousel">
                            @foreach($category->relatedProducts as $key => $relatedproduct)
                                @if($relatedproduct->brand == "$product->brand")
                                    <div class="item mb-3">
                                        <div class="product-card">
                                            <div class="product-card-img">
                                                @if($relatedproduct->productImages->count() > 0)
                                                <a href="{{ url('/collections/'.$relatedproduct->category->slug.'/'.$relatedproduct->slug) }}">
                                                    <img src="{{ asset($relatedproduct->productImages[0]->image) }}" alt="{{ $relatedproduct->name }}">
                                                </a>
                                                @endif
                                            </div>
                                            <div class="product-card-body">
                                                <p class="product-brand">{{ $relatedproduct->brand }}</p>
                                                <h5 class="product-name">
                                                    <a href="{{ url('/collections/'.$relatedproduct->category->slug.'/'.$relatedproduct->slug) }}">
                                                        {{ $relatedproduct->name }}
                                                    </a>
                                                </h5>
                                                <div>
                                                    <span class="selling-price">{{ $relatedproduct->selling_price.'Fcfa' }}</span>
                                                    <span class="original-price">{{ $relatedproduct->original_price.'Fcfa' }} </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @else
                        <div class="p-2">
                            <h5>No Related Products Available</h5>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>


@push('scripts')
<script>
    $(function(){

        $("#exzoom").exzoom({
            "navWidth": 60,
            "navHeight": 60,
            "navItemNum": 5,
            "navItemMargin": 7,
            "navBorder": 1,
            "autoPlay":true,
            "autoPlayTimeout": 5000
        });
    });

    $('.four-carousel').owlCarousel({
        // rtl:true,
        loop:true,
        margin:10,
        dots:true,
        nav:false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:4
            }
        }
    });
</script>
@endpush
