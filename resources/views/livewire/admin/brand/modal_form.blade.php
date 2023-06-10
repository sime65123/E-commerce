<!-- Button Add Brand Modal -->
<div wire:ignore.self class="modal fade" id="addBrandModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-uppercase text-primary text-bold" id="modalCenterTitle">Add Brands</h4>
                <button
                type="button"
                class="btn-close"
                wire:click="closeModal"
                data-bs-dismiss="modal"
                aria-label="Close"
                ></button>
            </div>
            <div wire:loading class="py-3 text-center">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>Loading...
            </div>

            <div wire:loading.remove>
                <form wire:submit.prevent="storeBrand">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="">Select Category</label>
                            <select wire:model.defer="category_id" class="form-control" required>
                                <option value="">--Select Category--</option>
                                @foreach($categories as $key => $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Brand Name</label>
                            <input type="text" wire:model.defer="name" class="form-control">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Brand Slug</label>
                            <input type="text" wire:model.defer="slug" class="form-control">
                            @error('slug')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Status</label><br>
                            <input type="checkbox" wire:model.defer="status" style="width: 30px; height: 30px;"><p class="alert alert-primary"> Checked = Hidden, Un-Checked = Visible</p>
                            @error('status')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click="closeModal" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                        </button>
                        <button type="submit" class="btn btn-outline-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

 <!-- Button Update Modal -->
 <div wire:ignore.self class="modal fade" id="updateBrandModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-uppercase text-primary text-bold" id="modalCenterTitle">Edit Brands</h4>
                <button
                type="button"
                class="btn-close"
                wire:click="closeModal"
                data-bs-dismiss="modal"
                aria-label="Close"
                ></button>
            </div>
            <div wire:loading class="py-3 text-center">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>Loading...
            </div>

            <div wire:loading.remove>
                <form wire:submit.prevent="updateBrand">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="">Select Category</label>
                            <select wire:model.defer="category_id" class="form-control" required>
                                <option value="">--Select Category--</option>
                                @foreach($categories as $key => $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Brand Name</label>
                            <input type="text" wire:model.defer="name" class="form-control">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Brand Slug</label>
                            <input type="text" wire:model.defer="slug" class="form-control">
                            @error('slug')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Status</label><br>
                            <input type="checkbox" wire:model.defer="status" style="width: 30px; height: 30px;"><p class="alert alert-primary"> Checked = Hidden, Un-Checked = Visible</p>
                            @error('status')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click="closeModal" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                        </button>
                        <button type="submit" class="btn btn-outline-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Button Delete Modal -->
<div wire:ignore.self class="modal fade" id="deleteBrandModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-uppercase text-danger text-bold" id="modalCenterTitle">Brand Delete</h4>
                <button
                type="button"
                class="btn-close"
                wire:click="closeModal"
                data-bs-dismiss="modal"
                aria-label="Close"
                ></button>
            </div>
            <div wire:loading class="py-3 text-center">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>Loading...
            </div>

            <div wire:loading.remove>
                <form wire:submit.prevent="destroyBrand">
                    <div class="modal-body">
                        <h5 class="alert alert-danger">Are you sure you want to delete this data ?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click="closeModal" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                        </button>
                        <button type="submit" class="btn btn-outline-primary">Yes. Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
