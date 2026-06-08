@extends('master.layout')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-dark">Your Shopping Cart 🛒</h2>
        @if(count($cart) > 0)
            <a href="{{ route('cart.clear') }}" class="btn btn-outline-danger btn-sm rounded-pill px-3" onclick="return confirm('Empty your entire cart?')">
                Clear Cart
            </a>
        @endif
    </div>

    @if(count($cart) > 0)
        <div class="card border-0 shadow-sm p-4" style="border-radius: 20px;">
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th style="width: 100px;">Qty</th>
                            <th>Subtotal</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total = 0; @endphp
                        @foreach($cart as $id => $details)
                            @php $total += $details['price'] * $details['quantity']; @endphp
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('images/' . $details['image']) }}" width="50" height="50" class="rounded me-3" style="object-fit: cover;">
                                        <span class="fw-bold">{{ $details['name'] }}</span>
                                    </div>
                                </td>
                                <td>RM {{ number_format($details['price'], 2) }}</td>
                                <td>
                                    <form action="{{ route('cart.update', $id) }}" method="POST">
                                        @csrf
                                        <input type="number" name="quantity" value="{{ $details['quantity'] }}" 
                                               class="form-control form-control-sm text-center rounded-pill" 
                                               min="1" onchange="this.form.submit()">
                                    </form>
                                </td>
                                <td class="fw-bold">RM {{ number_format($details['price'] * $details['quantity'], 2) }}</td>
                                <td class="text-end">
                                    <form action="{{ route('cart.remove', $id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm text-danger border-0">
                                            Remove
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="row mt-4 align-items-center">
                <div class="col-md-6">
                    <a href="{{ route('shop') }}" class="btn btn-outline-dark rounded-pill px-4">
                        ← Back to Shop
                    </a>
                </div>
                <div class="col-md-6 text-md-end mt-3 mt-md-0">
                    <h3 class="fw-bold mb-3 text-dark">Total: RM {{ number_format($total, 2) }}</h3>
                    <form action="{{ route('checkout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-lg rounded-pill px-5 shadow-sm fw-bold w-100 w-md-auto">
                            Checkout Now
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @else
        <div class="text-center py-5 border rounded-4 bg-light">
            <div class="display-1 mb-3">🛍️</div>
            <h4 class="text-muted">Your cart is feeling a bit light.</h4>
            <p class="mb-4">Go fill it up with some coffee or flowers!</p>
            <a href="{{ route('shop') }}" class="btn btn-danger rounded-pill px-5 py-2">Start Shopping</a>
        </div>
    @endif
</div>
@endsection