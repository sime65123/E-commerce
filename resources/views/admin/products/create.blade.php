@extends('layouts\admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3> Add product
                    <a href="{{ url('admin/products') }}" class="btn btn-danger btn-sm text-white float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">

                @if($errors->any())
                    <div class="alert alert-warning">
                        @foreach($errors->all() as $error)
                            <div class="text-danger">{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <form action="{{ url('admin/products') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                type="button" role="tab" aria-controls="home" aria-selected="true">
                                Home
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="seotag-tab" data-bs-toggle="tab" data-bs-target="#seotag"
                                type="button" role="tab" aria-controls="seotag" aria-selected="false">
                                SEO TAGS
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details"
                                type="button" role="tab" aria-controls="details" aria-selected="false">
                                Details
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image"
                                type="button" role="tab" aria-controls="image" aria-selected="false">
                                Product Images
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="color-tab" data-bs-toggle="tab" data-bs-target="#color"
                                type="button" role="tab" aria-controls="color" aria-selected="false">
                                Product colors
                            </button>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content my-4">

                        <!-- Tab home products -->
                        <div class="tab-pane fade border p-3 show active" id="home" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            <div class="mb-3">
                                <label> Category Product</label>
                                <select name="category_id"  class="form-control">
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"> {{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="name"> Product Name </label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control ">
                            </div>
                            <div class="mb-3">
                                <label for="slug"> Product Slug </label>
                                <input type="text" name="slug" id="slug" value="{{ old('slug') }}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Brand Product</label>
                                <select name="brand" class="form-control">
                                    @foreach ($brands as $brand)
                                    <option value="{{ $brand->name }}"> {{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="small_description"> Small Description Product (500 words) </label>
                                <textarea name="small_description" id="small_description" class="form-control" cols="30"
                                    rows="4">{{ old('small_description') }} </textarea>
                            </div>
                            <div class="mb-3">
                                <label for="description"> Description Product </label>
                                <textarea name="description" id="description" class="form-control" cols="30"
                                    rows="5"> {{ old('description') }}</textarea>
                            </div>
                        </div>

                        <!-- Tab seotags products -->
                        <div class="tab-pane fade border p-3" id="seotag" role="tabpanel" aria-labelledby="seotag-tab" tabindex="0">
                            <div class="mb-3">
                                <label for="meta_title"> Meta Title</label>
                                <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title') }}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="meta_description"> Meta Description </label>
                                <textarea name="meta_description" id="meta_description" class="form-control" cols="30"
                                    rows="3">{{ old('meta_description') }} </textarea>
                            </div>
                            <div class="mb-3">
                                <label for="meta_keyword"> Meta Keyword </label>
                                <textarea name="meta_keyword" id="meta_keyword" class="form-control" cols="30"
                                    rows="3">{{ old('meta_keyword') }}</textarea>
                            </div>
                        </div>

                        <!-- Tab details products -->
                        <div class="tab-pane fade border p-3" id="details" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="original_price"> Original Price</label>
                                        <input type="number" name="original_price" id="original_price" value="{{ old('original_price') }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="selling_price"> Selling Price</label>
                                        <input type="number" name="selling_price" id="selling_price" value="{{ old('selling_price') }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="quantity"> Quantity</label>
                                        <input type="number" name="quantity" id="quantity" value="{{ old('quantity') }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <table>
                                            <tr>
                                                <td><label for="trending" class="mx-1"> Trending </label></td>
                                                <td><input type="checkbox" name="trending" id="trending" style="width: 30px; height: 50px;"></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <table>
                                            <tr>
                                                <td><label for="featured" class="mx-1"> Featured </label></td>
                                                <td><input type="checkbox" name="featured" id="featured" style="width: 30px; height: 50px;"></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <table>
                                            <tr>
                                                <td><label for="status" class="mx-1"> Status </label></td>
                                                <td><input type="checkbox" name="status" id="status" style="width: 30px; height: 50px;"></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tab Images product -->
                        <div class="tab-pane fade border p-3" id="image" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                            <div class="mb-3">
                                <label> Upload Product Images</label>
                                <input type="file" multiple name="image[]" class="form-control">
                            </div>
                        </div>

                         <!-- Tab Colors product -->
                         <div class="tab-pane fade border p-3" id="color" role="tabpanel" aria-labelledby="color-tab" tabindex="0">
                            <div class="mb-3">
                                <label class="my-1"> Select Color Product</label><hr>
                                <div class="row">
                                    @forelse($colors as $color)
                                        <div class="col-md-3">
                                            <div class="p-2 border mb-3">
                                                Color : <input type="checkbox" multiple name="colors[{{ $color->id }}]" value="{{ $color->id }}">
                                                {{ $color->name }}
                                                <br>
                                                Quantity : <input type="number" multiple name="colorquantity[{{ $color->id }}]" style=" width: 80px; border:1px solid;">
                                            </div>
                                        </div>
                                    @empty
                                        <div class="col-md-12">
                                            <h4 class="alert alert-warning">No color Found</h4>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Submit final button -->
                    <div class="mb-3">
                        <button type="submit" class="btn btn-outline-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
