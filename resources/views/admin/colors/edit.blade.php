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
                    <h3>Add Color
                        <a href="{{ url('admin/colors') }}" class="btn btn-danger btn-sm float-end">Back</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/colors/'.$color->id) }}" method="POST">
                        @csrf
                        @method('put')

                        <div class="mb-3">
                            <label for="name">Color Name</label>
                            <input type="text" name="name" id="name" value="{{ $color->name }}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="code">Color Code</label>
                            <input type="text" name="code" id="code" value="{{ $color->code }}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="status">Color Status</label><br>
                            <input type="checkbox" name="status" id="status" {{ $color->status == '1' ? 'checked':'' }} class="my-1" style="width: 40px; height: 40px;"><p class="alert alert-success">Checked=Hidden, UnChecked=Visible</p>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-outline-primary">Upadte</button>
                        </div>
                    </form>
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
