<div>
    <div class="row">
        <div class="col-md-3">
            @if($category->brands)
                <div class="card">
                    <div class="card-header">
                        <h4>Brands</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-block">
                            @foreach ($category->brands as $brandItem)
                                <label class="d-block">
                                    <input type="checkbox" wire:model="brandInputs" value="{{ $brandItem->name }}" > {{  $brandItem->name }}
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            <div class="card mt-3">
                <div class="card-header">
                    <h4>Price</h4>
                </div>
                <div class="card-body">
                    <div class="d-block">
                        <label class="d-block">
                            <input type="radio" name="priceSort" wire:model="priceInput" value="high-to-low" > High To Low
                        </label>
                        <label class="d-block">
                            <input type="radio" name="priceSort" wire:model="priceInput" value="low-to-high" > Low To High
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row">
                @forelse($products as $key => $product)
                    <div class="col-md-4">
                        <div class="product-card">
                            <div class="product-card-img">
                                @if ($product->quantity > 0)
                                    <label class="stock bg-success">In Stock</label>
                                @else
                                <label class="stock bg-danger">Out of Stock</label>
                                @endif

                                @if($product->productImages->count() > 0)
                                    <a href="{{ url('/collections/'.$product->category->slug.'/'.$product->slug) }}">
                                        <img src="{{ asset($product->productImages[0]->image) }}" alt="{{ $product->name }}">
                                    </a>
                                @endif
                            </div>
                            <div class="product-card-body">
                                <p class="product-brand">{{ $product->brand }}</p>
                                <h5 class="product-name">
                                <a href="{{ url('/collections/'.$product->category->slug.'/'.$product->slug) }}">
                                    {{ $product->name }}
                                </a>
                                </h5>
                                <div>
                                    <span class="selling-price">{{ $product->selling_price }} Fcfa</span>
                                    <span class="original-price">{{ $product->original_price }} Fcfa</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        <h5>No Products Available For {{ $category->name }}</h5>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

</div>
