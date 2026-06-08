@extends('master.layout')

@section('content')
<div class="container py-5">
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('shop') }}" class="text-theme">Shop</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/shop/'.$product->category) }}" class="text-theme">{{ $product->category }}</a></li>
            <li class="breadcrumb-item active">{{ $product->name }}</li>
        </ol>
    </nav>

    <div class="row g-5">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm overflow-hidden" style="border-radius: 25px;">
                <img src="{{ asset('images/' . $product->image) }}" class="img-fluid" 
                     style="width: 100%; height: 500px; object-fit: cover; {{ !$product->is_available ? 'filter: grayscale(1); opacity: 0.6;' : '' }}">
            </div>
        </div>

        <div class="col-md-6 d-flex flex-column justify-content-center">
            <span class="badge bg-light text-theme border px-3 py-2 rounded-pill mb-2 w-fit-content" style="width: fit-content;">
                {{ $product->category }}
            </span>
            <h1 class="display-4 fw-bold text-theme mb-3">{{ $product->name }}</h1>
            
            <h2 class="text-dark fw-bold mb-4">RM {{ number_format($product->price, 2) }}</h2>
            
            <div class="mb-5">
                <h5 class="fw-bold text-theme text-uppercase small">Description</h5>
                <p class="text-muted fs-5 leading-relaxed">{{ $product->description }}</p>
            </div>

            @if($product->is_available)
                <form action="{{ route('cart.add', $product->id) }}" method="POST" class="d-flex gap-3">
                    @csrf
                    <input type="number" name="quantity" value="1" min="1" class="form-control rounded-pill text-center" style="width: 80px;">
                    <button type="submit" class="btn btn-theme btn-lg flex-grow-1 shadow-sm fw-bold">
                        Add to Cart
                    </button>
                </form>
            @else
                <button class="btn btn-secondary btn-lg rounded-pill w-100 fw-bold" disabled>
                    Currently Sold Out
                </button>
            @endif
        </div>
    </div>
</div>
@endsection