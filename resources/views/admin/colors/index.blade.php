@extends('layouts\admin')

@section('content')

<div class="container-scroller">

    <!-- Button Delete Color Modal -->
    <div wire:ignore.self class="modal fade" id="deleteProductModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Product Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                    <h3>Colors List
                        <a href="{{ url('admin/colors/create') }}" class="btn btn-primary btn-sm float-end">Add
                            Color</a>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Color Name</th>
                                    <th>Color Code</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($colors as $color)
                                <tr>
                                    <td class="py-1">
                                        {{ $color->id }}
                                    </td>
                                    <td>
                                        {{ $color->name }}
                                    </td>
                                    <td>
                                        {{ $color->code }}
                                    </td>
                                    <td>
                                        {{ $color->status =='1' ? 'Hidden':'Visible' }}
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/colors/'.$color->id.'/edit') }}"
                                            class="btn btn-outline-success mx-1">Edit</a>

                                        <!-- Button trigger modal -->
                                        <a href="{{ url('admin/colors/'.$color->id.'/delete') }}"
                                            onclick="return confirm('Are you sure, you want to delete this data?')"
                                            class="btn btn-outline-danger my-1">Delete</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8">No Colors Available</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="py-2">
                        {{ $colors->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    window.addEventListener('close-modal', event => {
            $('#deleteProductModal').modal('hide');
        });
</script>
@endpush
