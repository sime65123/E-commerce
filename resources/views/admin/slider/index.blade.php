@extends('layouts\admin')

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
                    <h3>Slider List
                        <a href="{{ url('admin/sliders/create') }}" class="btn btn-primary btn-sm float-end">Add
                            Slider</a>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title </th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($sliders as $slider)
                                <tr>
                                    <td class="py-1">
                                        {{ $slider->id }}
                                    </td>
                                    <td>
                                        {{ $slider->title }}
                                    </td>
                                    <td>
                                        {{ $slider->description }}
                                    </td>
                                    <td>
                                        <img src="{{ asset("$slider->image") }}" style="width: 70px; height: 70px" alt="SLider">
                                    </td>
                                    <td>
                                        {{ $slider->status =='1' ? 'Hidden':'Visible' }}
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/sliders/'.$slider->id.'/edit') }}"
                                            class="btn btn-outline-success mx-1">Edit</a>

                                        <!-- Button trigger modal -->
                                        <a href="{{ url('admin/sliders/'.$slider->id.'/delete') }}"
                                            onclick="return confirm('Are you sure, you want to delete this data?')"
                                            class="btn btn-outline-danger my-1">Delete</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8">No Sliders Available</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="py-2">
                        {{ $sliders->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

