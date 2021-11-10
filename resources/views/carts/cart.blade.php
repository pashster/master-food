@if(session('products'))
    <div class="btn-group dropleft basket">
        <button type="button" class="btn btn-secondary dropdown-toggle bi-cart-check" data-toggle="dropdown"
                aria-haspopup="false" data-flip="false" aria-expanded="false">
            <i class="bi bi-cart-check"></i>
        </button>
        <div class="dropdown-menu">
            <h6 class="dropdown-header">Order Summary</h6>
            @include('carts.items')
            <a href="{{route('items.createOrder')}}" class="dropdown-item create-order" type="button">Create order <i class="bi bi-cart-check-fill" style="color: green"></i></a>
        </div>
    </div>
@endif
