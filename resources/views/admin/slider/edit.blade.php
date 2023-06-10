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

            @if($errors->any())
                <div class="alert alert-warning">
                    @foreach($errors->all() as $error)
                        <div class="text-danger">{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h3>Edit Slider
                        <a href="{{ url('admin/sliders/') }}" class="btn btn-danger btn-sm float-end">Back</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/sliders/'.$slider ->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" value="{{ $slider->title }}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="description">Description</label>
                            <textarea  name="description" id="description" rows="3" class="form-control">{{ $slider->description }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" class="form-control">
                            <img src="{{ asset("$slider->image") }}" style="width: 50px; height: 50px;" class="my-1" alt="IMG_SLIDER">
                        </div>
                        <div class="mb-3">
                            <label for="status">Status</label><br>
                            <input type="checkbox" name="status" id="status" {{ $slider->status == '1' ? 'checked':'' }} class="my-1" style="width: 40px; height: 40px;"><p class="alert alert-success">Checked=Hidden, UnChecked=Visible</p>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-outline-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


