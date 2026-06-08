@extends('master.layout')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-danger mb-0">Customer Purchase History</h2>
            <p class="text-muted">Tracking all successful orders from Brew & Blossom.</p>
        </div>
        <a href="{{ route('admin.home') }}" class="btn btn-outline-dark rounded-pill px-4">
            ← Back to Products
        </a>
    </div>

    <div class="card border-0 shadow-sm p-4" style="border-radius: 20px;">
        <div class="table-responsive">
            <table class="table align-middle table-hover">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3">Order ID</th>
                        <th>Customer Details</th>
                        <th>Products Bought</th>
                        <th>Total Amount</th>
                        <th>Date & Time</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        // Fetching orders with user and items directly for simplicity
                        $orders = App\Models\Order::with(['user', 'items'])->orderBy('id', 'desc')->get();
                    @endphp

                    @forelse($orders as $order)
                        <tr>
                            <td class="ps-3 fw-bold">#{{ $order->id }}</td>
                            <td>
                                <div class="fw-bold">{{ $order->user->name ?? 'Unknown User' }}</div>
                                <div class="small text-muted">{{ $order->user->email ?? '' }}</div>
                            </td>
                            <td>
                                <ul class="list-unstyled mb-0">
                                    @foreach($order->items as $item)
                                        <li class="small">
                                            <span class="badge bg-danger-subtle text-danger rounded-pill me-1">
                                                {{ $item->quantity }}x
                                            </span> 
                                            {{ $item->product_name }}
                                        </li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                <span class="fw-bold text-dark">RM {{ number_format($order->total_amount, 2) }}</span>
                            </td>
                            <td>
                                <div class="small text-muted">
                                    {{ $order->created_at->format('d M Y') }}<br>
                                    {{ $order->created_at->format('h:i A') }}
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-5">
                                <div class="text-muted">
                                    <h5 class="mb-0">No orders found yet.</h5>
                                    <p class="small">When customers checkout, their details will appear here.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection