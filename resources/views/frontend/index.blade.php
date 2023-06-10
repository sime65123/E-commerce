@extends('layouts.app')

@section('title', 'Home Page')

@section('content')

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">

    <div class="carousel-inner">

        @foreach($sliders as $key => $slider)
            <div class="carousel-item {{ $key == 0 ? 'active':'' }}">
                @if($slider->image)
                    <img src="{{ asset("$slider->image") }}" class="d-block" style="width: 100vw; height: 80vh; object-fit: cover;" alt="...">
                @endif
                <div class="carousel-caption d-none d-md-block">
                    <div class="custom-carousel-content">
                        <h1>
                            {!! $slider->title !!}
                        </h1>
                        <p>
                            {!! $slider->description !!}
                        </p>
                        <div>
                            <a href="#" class="btn btn-outline-primary btn-slider">
                                Get Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="py-5 bg-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h4>Welcome to ITE EXPERTS E-Commerce</h4>
                <div class="underline mx-auto"></div>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Laboriosam sed molestias, possimus dolores ducimus quae
                    ipsa eius modi! Fugit iste sit rem, facere nostrum ab
                    rerum suscipit maxime sequi vel?
                </p>
            </div>
        </div>
    </div>
</div>


<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Trending Products</h4>
                <div class="underline mb-4"></div>
            </div>

            @if ($trendingProducts)
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme four-carousel">
                        @foreach($trendingProducts as $key => $product)
                            <div class="item">
                                <div class="product-card">
                                    <div class="product-card-img">
                                        <label class="stock bg-danger">New</label>

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
                        @endforeach
                    </div>
                </div>
            @else
                <div class="col-md-12">
                    <div class="p-2">
                        <h5>No Trending Products Available</h5>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

<div class="py-5" style="background-color: lightgray;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>New Arrivals</h4>
                <div class="underline mb-4"></div>
            </div>

            @if ($newArrivalsProducts)
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme four-carousel">
                        @foreach($newArrivalsProducts as $key => $product)
                            <div class="item">
                                <div class="product-card">
                                    <div class="product-card-img">
                                        <label class="stock bg-danger">New</label>

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
                        @endforeach
                    </div>
                </div>
            @else
                <div class="col-md-12">
                    <div class="p-2">
                        <h5>No New Arrivals Products Available
                            <a href="{{ url('new-arrivals') }}" class="btn btn-warning float-end">View More</a>
                        </h5>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>


<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Featured Products
                    <a href="{{ url('featured-products') }}" class="btn btn-warning float-end">View More</a>
                </h4>
                <div class="underline mb-4"></div>
            </div>

            @if ($featuredProducts)
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme four-carousel">
                        @foreach($featuredProducts as $key => $product)
                            <div class="item">
                                <div class="product-card">
                                    <div class="product-card-img">
                                        <label class="stock bg-danger">New</label>

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
                        @endforeach
                    </div>
                </div>
            @else
                <div class="col-md-12">
                    <div class="p-2">
                        <h5>No Featured Products Available</h5>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

@endsection

@section('script')
    <script>
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
        })
    </script>
@endsection
