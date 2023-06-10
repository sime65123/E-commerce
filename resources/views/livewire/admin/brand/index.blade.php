<div class="container-scroller">

    <!-- modal create, update and delete brand -->
    @include('livewire\admin\brand\modal_form')

    <div class="row">
        <div class="col-md-12">

            @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Brands List
                        <!-- Button create modal brand -->
                        <a href="#" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal"
                        data-bs-target="#addBrandModal">Add Brand</a>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($brands as $brand)
                                <tr>
                                    <td class="py-1">
                                        {{ $brand->id }}
                                    </td>
                                    <td>
                                        {{ $brand->name }}
                                    </td>
                                    <td>
                                        @if ($brand->category)
                                            {{ $brand->category->name }}
                                        @else
                                            <h5>No Category</h5>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $brand->status =='1' ? 'Hidden':'Visible' }}
                                    </td>
                                    <td>
                                        <!-- Button Edit modal brand -->
                                        <a href="#" wire:click="editBrand({{ $brand->id }})" class="btn btn-outline-success mx-1" data-bs-toggle="modal"
                                        data-bs-target="#updateBrandModal">Edit</a>

                                         <!-- Button Delete modal brand -->
                                        <a href="#" wire:click="deleteBrand({{ $brand->id }})" class="btn btn-outline-danger my-1" data-bs-toggle="modal"
                                        data-bs-target="#deleteBrandModal">Delete</a>
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="5"><p class="alert alert-danger">No Brands Found</p></td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="py-2">
                        {{ $brands->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        window.addEventListener('close-modal', event => {
            $('#addBrandModal').modal('hide');
            $('#updateBrandModal').modal('hide');
            $('#deleteBrandModal').modal('hide');
        });
    </script>
@endpush
