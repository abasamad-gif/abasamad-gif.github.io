@extends('master.layout')

@section('content')
<div class="container py-5">
    <div class="p-5 rounded-4 shadow-sm text-white mb-5" style="background: linear-gradient(45deg, #1c3c2d, #2d5a44);">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="fw-bold">Management Dashboard</h1>
                <p class="lead opacity-75 mb-0">Welcome back, {{ Session::get('user_name') }}! Manage your Brew & Blossom inventory here.</p>
            </div>
            <div class="col-md-4 text-md-end">
                <a href="{{ route('admin.purchases') }}" class="btn btn-warning fw-bold rounded-pill px-4">
                    <i class="bi bi-cart-check-fill me-2"></i>View Orders
                </a>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm p-4" style="border-radius: 20px;">
                <h4 class="fw-bold mb-4" style="color: #1c3c2d;">Add New Item</h4>
                
                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Product Name</label>
                        <input type="text" name="name" class="form-control bg-light border-0" placeholder="e.g. Arabica Roast" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold">Category</label>
                        <select name="category" class="form-select bg-light border-0" required>
                            <option value="coffee">Coffee</option>
                            <option value="flowers">Flowers</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold">Price ($)</label>
                        <input type="number" step="0.01" name="price" class="form-control bg-light border-0" placeholder="0.00" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold">Description</label>
                        <textarea name="description" class="form-control bg-light border-0" rows="3" placeholder="Describe the item..."></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="form-label small fw-bold">Product Image</label>
                        <input type="file" name="image" class="form-control bg-light border-0" required>
                    </div>

                    <button type="submit" class="btn w-100 fw-bold py-2 text-white" style="background-color: #1c3c2d; border-radius: 10px;">
                        Upload Product
                    </button>
                </form>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card border-0 shadow-sm" style="border-radius: 20px;">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="ps-4 py-3">Product</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th class="text-end pe-4">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($products as $product)
                                <tr>
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center gap-3">
                                            <img src="{{ asset('images/' . $product->image) }}" class="rounded shadow-sm" style="width: 50px; height: 50px; object-fit: cover;">
                                            <div>
                                                <div class="fw-bold">{{ $product->name }}</div>
                                                <small class="text-muted">ID: #{{ $product->id }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-secondary text-capitalize">{{ $product->category }}</span></td>
                                    <td class="fw-bold">${{ number_format($product->price, 2) }}</td>
                                    <td>
                                        @if($product->is_available)
                                            <span class="badge bg-success">Available</span>
                                        @else
                                            <span class="badge bg-danger">Sold Out</span>
                                        @endif
                                    </td>
                                    <td class="text-end pe-4">
                                        <div class="d-flex justify-content-end gap-2">
                                            <form action="{{ route('admin.products.toggle', $product->id) }}" method="POST">
                                                @csrf
                                                <button class="btn btn-sm btn-outline-primary border-0">
                                                    <i class="bi bi-arrow-repeat"></i>
                                                </button>
                                            </form>
                                            
                                            <form action="{{ route('admin.products.delete', $product->id) }}" method="POST" onsubmit="return confirm('Delete this product?')">
                                                @csrf
                                                <button class="btn btn-sm btn-outline-danger border-0">
                                                    <i class="bi bi-trash3"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center py-5">
                                        <i class="bi bi-box-seam display-4 text-muted"></i>
                                        <p class="mt-2 text-muted">No products found in the database.</p>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection