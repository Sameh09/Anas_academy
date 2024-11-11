<div>
    <!-- Create New User Modal -->
    <div class="modal fade" wire:ignore.self id="productModal" tabindex="-1" aria-labelledby="productModal"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create New Product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="">
                        @csrf
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" wire:model.live.debounce.300ms="name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Price</label>
                            <input type="text" class="form-control" wire:model.live.debounce.300ms="price">
                            @error('price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Quantity</label>
                            <input type="text" class="form-control" wire:model.live.debounce.300ms="quantity">
                            @error('quantity')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" wire:click.prevent="create">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

  

</div>

<script script>
    window.addEventListener('close-modal', event => {
        $('#productModal').modal('hide');
        
    })
</script>
