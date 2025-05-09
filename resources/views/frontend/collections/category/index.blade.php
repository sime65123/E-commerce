@extends('layouts.app')

@section('title', 'All Categories')

@section('content')

<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-4"><b> Our Categories</b></h4>
            </div>
            @forelse ($categories as $key => $category)
                <div class="col-6 col-md-3">
                    <div class="category-card">
                        <a href="{{ url('/collections/'.$category->slug) }}">
                            <div class="category-card-img">
                                <img src="{{ asset("$category->image") }}" alt="ImageCategory">
                            </div>
                            <div class="category-card-body">
                                <h5>{{ $category->name }}</h5>
                            </div>
                        </a>
                    </div>
                </div>
                @empty
                 <div class="col-md-12">
                    <h5>No Categories Available</h5>
                </div>
            @endforelse
        </div>
    </div>
</div>

@endsection
