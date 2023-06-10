@extends('layouts.app')

@section('title', 'Featured Products Page')

@section('content')
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Featured Products</h4>
                <div class="underline mb-4"></div>
            </div>

            @forelse($featuredProducts as $key => $product)
                <div class="col-md-3">
                    <div class="product-card">
                        <div class="product-card-img">
                            <label class="stock bg-success">New</label>

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
                                <span class="selling-price">{{ $product->selling_price.'Fcfa' }}</span>
                                <span class="original-price">{{ $product->original_price.'Fcfa' }} </span>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12 p-2">
                    <h5>No Featured Products Available</h5>
                </div>
            @endforelse

            <div class="text-center">
                <a href="{{ url('collections') }}" class="btn btn-lg btn-outline-primary px-3"><h4>Shop More</h4></a>
            </div>

        </div>
    </div>
</div>
@endsection
