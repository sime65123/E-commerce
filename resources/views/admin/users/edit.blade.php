@extends('layouts\admin')

@section('title', 'User List')

@section('content')

<div class="container-scroller">
    <div class="row">
        <div class="col-md-12">

            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            @if($errors->any())
                <ul class="alert alert-warning">
                    @foreach($errors->all() as $key => $error)
                        <li class="text-danger">{{ $error }}</li>
                    @endforeach
                </ul>
            @else

            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Edit User
                        <a href="{{ url('admin/users') }}" class="btn btn-danger btn-sm float-end">
                            Back</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/users/'.$user->id) }}" method="post">
                        @csrf
                        @method('put')

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name">Name</label>
                                <input style="border: solid lightgrey;" type="text" name="name" id="name" value="{{ $user->name }}" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email">Email</label>
                                <input style="border: solid lightgrey;" type="text" name="email" id="email" readonly value="{{ $user->email }}" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="password">Password</label>
                                <input style="border: solid lightgrey;" type="text" name="password" id="password" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="role_as">Select Role</label>
                                <select style="border: solid lightgrey;" name="role_as" id="role_as" class="form-control">
                                    <option value="">--Select Role--</option>
                                    <option value="0" {{ $user->role_as == '0' ? 'selected':'' }}>User</option>
                                    <option value="1" {{ $user->role_as == '1' ? 'selected':'' }}>Admin</option>
                                </select>
                            </div>
                            <div class="col-md-12 text-end">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
