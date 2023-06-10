@extends('layouts\admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        @if (session('message'))
        <h4 class="alert alert-success mb-2">{{ session('message') }}</h4>
        @endif
        <div class="card">
            <div class="card-header">
                <h3> Update product
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

                <form action="{{ url('admin/products/'.$product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')

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
                            <button class="nav-link" id="colors-tab" data-bs-toggle="tab" data-bs-target="#colors"
                                type="button" role="tab" aria-controls="colors" aria-selected="false">
                                Product Colors
                            </button>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content my-4">

                        <!-- Tab home products -->
                        <div class="tab-pane fade border p-3 show active" id="home" role="tabpanel"
                            aria-labelledby="home-tab" tabindex="0">
                            <div class="mb-3">
                                <label> Category Product</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $key => $category)
                                    <option value="{{ $category->id }}"  {{ $category->id == $product->category_id ?
                                        'selected':'' }}>
                                        {{ $category->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="name"> Product Name </label>
                                <input type="text" name="name" id="name" value="{{ $product->name }}"
                                    class="form-control ">
                            </div>
                            <div class="mb-3">
                                <label for="slug"> Product Slug </label>
                                <input type="text" name="slug" id="slug" value="{{ $product->slug }}"
                                    class="form-control">
                            </div>
                            <div class="mb-3">
                                <label> Brand Product</label>
                                <select name="brand" class="form-control">
                                    <option value="">Select Brand</option>
                                    @foreach ($brands as $brand)
                                    <option value="{{ $brand->name }}" {{ $brand->name == $product->brand ?
                                        'selected':'' }}>
                                        {{ $brand->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="small_description"> Small Description Product (500 words) </label>
                                <textarea name="small_description" id="small_description" class="form-control" cols="30"
                                    rows="4">{{ $product->small_description }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="description"> Description Product </label>
                                <textarea name="description" id="description" class="form-control" cols="30"
                                    rows="5">{{ $product->description }}</textarea>
                            </div>
                        </div>

                        <!-- Tab seotags products -->
                        <div class="tab-pane fade border p-3" id="seotag" role="tabpanel" aria-labelledby="seotag-tab"
                            tabindex="0">
                            <div class="mb-3">
                                <label for="meta_title"> Meta Title</label>
                                <input type="text" name="meta_title" id="meta_title" value="{{ $product->meta_title}}"
                                    class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="meta_description"> Meta Description </label>
                                <textarea name="meta_description" id="meta_description" class="form-control" cols="30"
                                    rows="3">{{ $product->meta_description }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="meta_keyword"> Meta Keyword </label>
                                <textarea name="meta_keyword" id="meta_keyword" class="form-control" cols="30"
                                    rows="3">{{ $product->meta_keyword }}</textarea>
                            </div>
                        </div>

                        <!-- Tab details products -->
                        <div class="tab-pane fade border p-3" id="details" role="tabpanel" aria-labelledby="details-tab"
                            tabindex="0">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="original_price"> Original Price</label>
                                        <input type="number" name="original_price" id="original_price"
                                            value="{{ $product->original_price }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="selling_price"> Selling Price</label>
                                        <input type="number" name="selling_price" id="selling_price"
                                            value="{{ $product->selling_price }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="quantity"> Quantity</label>
                                        <input type="number" name="quantity" id="quantity"
                                            value="{{ $product->quantity }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <table>
                                            <tr>
                                                <td><label for="trending" class="mx-1"> Trending </label></td>
                                                <td><input type="checkbox" name="trending" {{ $product->trending == '1'
                                                    ? 'checked':'' }} id="trending" style="width: 30px; height: 50px;">
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <table>
                                            <tr>
                                                <td><label for="featured" class="mx-1"> Featured </label></td>
                                                <td><input type="checkbox" name="featured" {{ $product->featured == '1'
                                                    ? 'checked':'' }} id="featured" style="width: 30px; height: 50px;">
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <table>
                                            <tr>
                                                <td><label for="status" class="mx-1"> Status </label></td>
                                                <td><input type="checkbox" name="status" id="status" {{ $product->status
                                                    == '1' ? 'checked':'' }} style="width: 30px; height: 50px;"></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tab Images product -->
                        <div class="tab-pane fade border p-3" id="image" role="tabpanel" aria-labelledby="image-tab"
                            tabindex="0">
                            <div class="mb-3">
                                <label> Upload Product Images</label>
                                <input type="file" multiple name="image[]" class="form-control">
                            </div>
                            <div>
                                @if($product->productImages)
                                <div class="row">
                                    @foreach ($product->productImages as $image)
                                    <div class="col-md-2">
                                        <img src="{{ asset($image->image) }}" style="width: 110px; height: 110px;"
                                            class="me-4 border" alt="IMG">
                                        <a href="{{ url('admin/product-image/'.$image->id.'/delete') }}"
                                            class="d-block btn btn-outline-danger my-1"
                                            style="width: 110px; height: auto;"> Remove</a>
                                    </div>
                                    @endforeach
                                </div>
                                @else
                                <h5 class="alert alert-success">No Image Added</h5>
                                @endif
                            </div>
                        </div>

                        <!-- Tab colors product -->
                        <div class="tab-pane fade border p-3" id="colors" role="tabpanel" aria-labelledby="colors-tab"
                            tabindex="0">
                            <div class="mb-3">
                                <h4>Add Product Color</h4>
                                <label class="my-1"> Select Color Product</label>
                                <hr>
                                <div class="row">
                                    @forelse($colors as $color)
                                    <div class="col-md-3">
                                        <div class="p-2 border mb-3">
                                            Color : <input type="checkbox" multiple name="colors[{{ $color->id }}]"
                                                value="{{ $color->id }}">
                                            {{ $color->name }}
                                            <br>
                                            Quantity : <input type="number" multiple
                                                name="colorquantity[{{ $color->id }}]"
                                                style=" width: 80px; border:1px solid;">
                                        </div>
                                    </div>
                                    @empty
                                    <div class="col-md-12">
                                        <h1 class="alert alert-warning">No color Found</h1>
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class=" table table-sm table-bordered">
                                    <thead>
                                        <th>Color Name</th>
                                        <th>Quantity</th>
                                        <th>Delete</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($product->productColors as $product_color)
                                        <tr class="prod-color-tr">
                                            <td>
                                                @if ($product_color->color)
                                                {{ $product_color->color->name }}
                                                @else
                                                No Color Found
                                                @endif
                                            </td>
                                            <td>
                                                <div class="input-group mb-3" style="width: 150px;">
                                                    <input type="text" value="{{ $product_color->quantity }}"
                                                        class="ProductColorQuantity form-control form-control-sm">
                                                    <button type="button" value="{{ $product_color->id }}"
                                                        class="updateProductColorBtn btn btn-primary btn-sm text-white">Update</button>
                                                </div>
                                            </td>
                                            <td>
                                                <button type="button" value="{{ $product_color->id }}"
                                                    class="deleteProductColorBtn btn btn-danger btn-sm text-white">Delete</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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

@section('scripts')

<script>
    $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click', '.updateProductColorBtn', function () {

                var product_id = "{{ $product->id }}";
                var product_color_id = $(this).val();
                var qty = $(this).closest('.prod-color-tr').find('.ProductColorQuantity').val();
                //alert(product_color_id);

                if (qty <= 0) {
                    alert('Quantity is Required');
                    return false;
                }

                var data = {
                    'product_id': product_id,
                    'qty': qty
                };

                $.ajax({
                    type: "POST",
                    url: "/admin/product-color/"+product_color_id,
                    data: data,
                    success: function (response) {
                        alert(response.message)
                    }
                });
            });

            $(document).on('click', '.deleteProductColorBtn', function () {

                var product_color_id = $(this).val();
                var thisClick = $(this);

                $.ajax({
                    type: "GET",
                    url: "/admin/product-color/"+product_color_id+"/delete",
                    success: function (response) {
                       thisClick.closest('.prod-color-tr').remove();
                       alert(response.message);
                    }
                });
            });
    });
</script>
@endsection
