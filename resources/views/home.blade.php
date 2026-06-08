@extends('master.layout')

@section('content')
<div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
    </div>

    <div class="carousel-inner">
        <div class="carousel-item active" style="height: 70vh; min-height: 500px;">
            <img src="{{ asset('images/1768514673.jpg') }}" class="d-block w-100 h-100" style="object-fit: cover; filter: brightness(0.8);" alt="Brew">
            <div class="carousel-caption d-flex flex-column justify-content-center h-100 text-start" style="left: 10%; right: 10%;">
                <div class="p-4 p-md-5" style="background: rgba(28, 60, 45, 0.6); backdrop-filter: blur(8px); border-radius: 30px; max-width: 600px; border: 1px solid rgba(255,255,255,0.2);">
                    <h1 class="display-3 fw-bold text-white mb-3">Wake Up to Perfection</h1>
                    <p class="fs-4 text-white-50 mb-4">Artisan coffee beans roasted to bring out the deepest flavors of the morning.</p>
                    <a href="{{ route('shop') }}" class="btn btn-warning btn-lg rounded-pill px-5 fw-bold shadow">Shop Coffee</a>
                </div>
            </div>
        </div>

        <div class="carousel-item" style="height: 70vh; min-height: 500px;">
            <img src="{{ asset('images/1768515103.webp') }}" class="d-block w-100 h-100" style="object-fit: cover; filter: brightness(0.8);" alt="Blossom">
            <div class="carousel-caption d-flex flex-column justify-content-center h-100 text-end align-items-end" style="left: 10%; right: 10%;">
                <div class="p-4 p-md-5" style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(12px); border-radius: 30px; max-width: 600px; border: 1px solid rgba(255,255,255,0.3);">
                    <h1 class="display-3 fw-bold text-white mb-3">Bloom with Grace</h1>
                    <p class="fs-4 text-white-50 mb-4">Hand-crafted bouquets that speak the language of elegance and love.</p>
                    <a href="{{ route('shop') }}" class="btn btn-light btn-lg rounded-pill px-5 fw-bold shadow">View Florals</a>
                </div>
            </div>
        </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>

<div class="container py-5 mt-5">
    <div class="row g-4 text-center">
        <div class="col-md-4">
            <div class="p-4 h-100">
                <i class="bi bi-patch-check fs-1" style="color: #1c3c2d;"></i>
                <h3 class="fw-bold mt-3">Premium Quality</h3>
                <p class="text-muted">Only the highest grade beans and freshest seasonal blooms.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-4 h-100">
                <i class="bi bi-person-check-fill fs-1" style="color: #1c3c2d;"></i>
                <h3 class="fw-bold mt-3">Fast Service</h3>
                <p class="text-muted">Fast and secure service to ensure you experience satisfaction.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-4 h-100">
                <i class="bi bi-stars fs-1" style="color: #1c3c2d;"></i>
                <h3 class="fw-bold mt-3">Curated Service</h3>
                <p class="text-muted">Every order is hand-picked and packed with meticulous care.</p>
            </div>
        </div>
    </div>
</div>
@endsection