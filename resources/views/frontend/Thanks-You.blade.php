@extends('layouts.app')

@section('title', 'Thanks You For Shopping')

@section('content')
    <div class="py-3 pyt-md-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    @if(session('message'))
                        <h4 class="alert alert-success">{{ session('message') }}</h4>
                    @endif
                    <div class="p-4 shadow bg-white">
                            <img src="{{ asset('uploads/1.jpg') }}" alt="">
                        <h4>Thanks You For Shopping With ITE-E-commerce</h4>
                        <a href="{{ url('collections') }}" class="btn btn-primary">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
