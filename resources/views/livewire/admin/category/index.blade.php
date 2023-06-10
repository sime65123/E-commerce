<div class="container-scroller">

    <!-- Button Delete Modal -->
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Category Delete</h5>
                    <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                    ></button>
                </div>
                <form wire:submit.prevent="destroyCategory">
                    <div class="modal-body">
                        <h5 class="alert alert-danger">Are you sure you want to delete this data ?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                        </button>
                        <button type="submit" class="btn btn-outline-primary">Yes. Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

            @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>All Categories
                        <a href="{{ url('admin/category/create') }}" class="btn btn-primary btn-sm float-end">Add
                            Category</a>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                <tr>
                                    <td class="py-1">
                                        {{ $category->id }}
                                    </td>
                                    <td>
                                        {{ $category->name }}
                                    </td>
                                    <td>
                                        {{ $category->description }}
                                    </td>
                                    <td>
                                        {{ $category->status =='1' ? 'Hidden':'Visible' }}
                                    </td>
                                    <td>
                                         <img src="{{ asset("$category->image") }}" style="width: 80px; height: 70px;" alt="IMG">
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/category/'.$category->id.'/edit') }}" class="btn btn-outline-success mx-1">Edit</a>
                                         <!-- Button trigger modal -->
                                        <a href="#" wire:click="deleteCategory({{ $category->id }})" class="btn btn-outline-danger my-1" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="py-2">
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        window.addEventListener('close-modal', event => {
            $('#deleteModal').modal('hide');
        });
    </script>
@endpush
