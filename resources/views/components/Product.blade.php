<div style="max-width: 300px;" x-data>
    <div class="card shadow-lg p-0 mb-4">
        <img src="{{ $product->first_photo_url }}" style="max-height: 200px; object-fit: cover" class="card-img-top"
            alt="Chicago Skyscrapers" />

        <div class="card-body pb-0" style="position: relative; padding-left: 14px">
            <button @click="addToChart({{$product}})" title="Register product"
                class="btn btn-floating btn-primary btn-lg"
                style="background-color: rgb(156, 130, 12); right: 10px; top: -20px; position: absolute;">
                <i class="fas fa-cart-plus"></i>
            </button>

            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="card-text text-muted">{{ Str::limit($product->description, 30, '...') }}</p>
        </div>
        <hr class="my-1">
        <ul class="list-group list-group-light list-group-small">
            <li class="list-group-item px-3 text-muted">
                <span class="pe-2"><b>Price:</b> ${{ number_format($product->price, 2) }}</span>
                <span class="pa-3 text-danger"><b>Qty:</b> {{ $product->qty }}</span>
            </li>
        </ul>
    </div>
</div>