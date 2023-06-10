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
            <div class="card">
                <div class="card-header">
                    <h3>All Users
                        <a href="{{ url('admin/users/create') }}" class="btn btn-primary btn-sm float-end">
                            Add User</a>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $user)
                                <tr>
                                    <td>
                                        {{ $user->id }}
                                    </td>
                                    <td>
                                        {{ $user->name }}
                                    </td>
                                    <td>
                                        {{ $user->email }}
                                    </td>
                                    <td>
                                        @if($user->role_as == '0')
                                            <label class="badge btn-warning">User</label>
                                        @elseif($user->role_as == '1')
                                            <label class="badge btn-primary">Admin</label>
                                        @else
                                            <label class="badge btn-danger">None</label>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/users/'.$user->id.'/edit') }}"
                                            class="btn btn-outline-success mx-1">Edit</a>
                                        <!-- Button trigger modal -->
                                        <a href="{{ url('admin/users/'.$user->id.'/delete') }}" onclick="return confirm('Are you sure, you want to delete this data?')" class="btn btn-outline-danger my-1">Delete</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5">No Users Available</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="py-2">
                        {{ $users->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

