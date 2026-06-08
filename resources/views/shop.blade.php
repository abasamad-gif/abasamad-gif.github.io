@extends('master.layout')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-center mb-5">
        <div class="btn-group p-1 rounded-pill border" style="background-color: #f8f9fa;">
            <a href="{{ route('shop') }}" class="btn {{ !request('category') ? 'bg-theme' : '' }} rounded-pill px-4">All</a>
            <a href="{{ url('/shop/Drinks') }}" class="btn {{ request()->is('shop/Drinks') ? 'bg-theme' : '' }} rounded-pill px-4">Drinks</a>
            <a href="{{ url('/shop/Flowers') }}" class="btn {{ request()->is('shop/Flowers') ? 'bg-theme' : '' }} rounded-pill px-4">Flowers</a>
        </div>
    </div>

    <div class="text-center mb-5">
        <h1 class="fw-bold text-theme display-5">{{ $categoryTitle }}</h1>
        <hr class="mx-auto" style="width: 60px; border-top: 3px solid #1c3c2d;">
    </div>

    <div class="row g-4">
        @forelse($products as $product)
            <div class="col-md-4 col-lg-3">
                <div class="card h-100 border-0 shadow-sm" style="border-radius: 15px;">
                    <div class="position-relative">
                        <a href="{{ route('product.show', $product->id) }}">
                            <img src="{{ asset('images/' . $product->image) }}" class="card-img-top" 
                                 style="height: 220px; object-fit: cover; border-radius: 15px 15px 0 0; {{ !$product->is_available ? 'filter: grayscale(1); opacity: 0.5;' : '' }}">
                        </a>
                        @if(!$product->is_available)
                            <div class="position-absolute top-50 start-50 translate-middle">
                                <span class="badge bg-dark px-3 py-2">SOLD OUT</span>
                            </div>
                        @endif
                    </div>
                    <div class="card-body d-flex flex-column">
                        <a href="{{ route('product.show', $product->id) }}" class="text-decoration-none">
                            <h6 class="fw-bold mb-1 text-theme">{{ $product->name }}</h6>
                        </a>
                        <p class="text-muted small mb-3">{{ Str::limit($product->description, 45) }}</p>
                        <div class="mt-auto d-flex justify-content-between align-items-center">
                            <span class="fw-bold fs-5 text-dark">RM {{ number_format($product->price, 2) }}</span>
                            @if($product->is_available)
                                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn bg-theme btn-sm rounded-pill px-3 fw-bold shadow-sm">Add</button>
                                </form>
                            @else
                                <button class="btn btn-secondary btn-sm rounded-pill px-3" disabled>Sold Out</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5 text-muted">No items available in this category.</div>
        @endforelse
    </div>
</div>
@endsection