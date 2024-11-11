<div class="mt-5 container">
    <div class="alert alert-secondary">
        <h2>Products</h2>
        <button class="btn btn-success btn-sm my-2" data-bs-toggle="modal" data-bs-target="#productModal">Add New</button>
        <input type="number" wire:model.live.debounce.300ms="value" class="form-control" placeholder="show products with a price greater than ">
    </div>
    @session('success')
    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @endsession
    <table class="mt-3 table table-striped table-borederd table-responsive">
        <thead class="table-secondary">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}$</td>
                    <td>{{ $product->quantity }}</td>
                    <td>
                        
                        <a href="{{route('checkout',$product->id)}}" class="btn btn-sm btn-warning">Buy</a></td>
                    
                </tr>
            @endforeach

        </tbody>
    </table>
    {{$products->links()}}
</div>


<script script>
    window.addEventListener('close-modal', event => {
        $('#productModal').modal('hide');
    })
  </script>