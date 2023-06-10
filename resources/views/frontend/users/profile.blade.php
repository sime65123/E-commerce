@extends('layouts.app')

@section('title', 'User Profile')

@section('content')
<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h4>User Profile
                    <a href="{{ url('change-password') }}" class="btn btn-warning float-end">Change Your Password</a>
                </h4>
                <div class="underline mb-4"></div>
            </div>

            <div class="col-md-10">
                @if (session('message'))
                    <p class="alert alert-success">{{ session('message') }}</p>
                @endif

                @if($errors->any())
                <ul class="alert alert-danger">
                    @foreach($errors->all() as $key => $error)
                        <li class="text-danger">{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
            </div>

            <div class="col-md-10">
                <div class="card shadow">
                    <div class="card-header bg-primary">
                        <h4 class="mb-0 text-white">User Details</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('profile') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name">Username</label>
                                        <input type="text" name="name" id="name" value="{{ Auth::user()->name }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email">Email Address</label>
                                        <input type="text" readonly name="email" id="email" value="{{ Auth::user()->email}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="phone">Phone Number</label>
                                        <input type="text" name="phone" id="phone" value="{{ Auth::user()->userDetail->phone ?? '' }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="pin_code">Zip/Pin Code</label>
                                        <input type="text" name="pin_code" id="pin_code" value="{{ Auth::user()->userDetail->pin_code ?? '' }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="address">Address</label>
                                        <textarea name="address" id="address" cols="30" rows="4" class="form-control">{{ Auth::user()->userDetail->address ?? '' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Save Data</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
       </div>
    </div>
</div>
@endsection
